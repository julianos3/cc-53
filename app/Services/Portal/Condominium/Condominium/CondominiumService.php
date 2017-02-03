<?php

namespace CentralCondo\Services\Portal\Condominium\Condominium;

use Carbon\Carbon;
use CentralCondo\Repositories\Portal\Condominium\Block\BlockNomemclatureRepository;
use CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepository;
use CentralCondo\Services\Portal\Communication\Notification\NotificationService;
use CentralCondo\Services\Portal\Condominium\Subscriptions\SubscriptionsService;
use CentralCondo\Services\Portal\User\UserService;
use CentralCondo\Services\Util\UtilObjeto;
use CentralCondo\Validators\Portal\Condominium\Condominium\CondominiumValidator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class CondominiumService
{
    protected $repository;

    protected $validator;

    protected $userCondominiumService;

    protected $blockRepository;

    protected $unitRepository;

    protected $blockNomemclatureRepository;

    protected $unitTypeRepository;

    protected $userService;

    protected $userCondominiumRepository;

    protected $utilObjeto;

    protected $notificationService;

    protected $filesystem;

    protected $storage;

    protected $subscriptionsService;

    public function __construct(CondominiumRepository $repository,
                                CondominiumValidator $validator,
                                UserCondominiumService $userCondominiumService,
                                UserService $userService,
                                BlockRepository $blockRepository,
                                BlockNomemclatureRepository $blockNomemclatureRepository,
                                UnitRepository $unitRepository,
                                UnitTypeRepository $unitTypeRepository,
                                UtilObjeto $utilObjeto,
                                NotificationService $notificationService,
                                UserCondominiumRepository $userCondominiumRepository,
                                Filesystem $filesystem,
                                Storage $storage, SubscriptionsService $subscriptionsService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userCondominiumService = $userCondominiumService;
        $this->blockRepository = $blockRepository;
        $this->blockNomemclatureRepository = $blockNomemclatureRepository;
        $this->unitRepository = $unitRepository;
        $this->unitTypeRepository = $unitTypeRepository;
        $this->userService = $userService;
        $this->utilObjeto = $utilObjeto;
        $this->notificationService = $notificationService;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
        $this->subscriptionsService = $subscriptionsService;
        $this->path = 'portal/' . session()->get('condominium_id') . '/condominium/condominium/';
    }

    public function update(array $data, $id)
    {
        try {
            //verifica condominio já cadastrado
            $condominium = $this->repository->findWhere([
                'zip_code' => $data['zip_code'],
                'address' => $data['address'],
                'number' => $data['number'],
                'district' => $data['district'],
                'city_id' => $data['city_id']
            ]);

            if ($condominium->toArray() && $condominium[0]->id != $id) {
                //remove usuario do condominio cadastrado errado
                //remove condominio cadastrado errado
                if ($this->clearUsersCondominium($id, Auth::user()->id)) {
                    $this->destroy($id);
                }

                return $this->create($data);
                /*
                //cadastra usuario no condominio
                $users['user_id'] = Auth::user()->id;
                $users['user_role_condominium'] = 1;
                $users['condominium_id'] = $condominium[0]->id;

                $this->userCondominiumService->create($users);
                $this->userService->userSessionCondominion();

                return redirect(route('portal.condominium.create.finish'));
                */
            } else {

                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->update($data, $id);

                if ($dados) {
                    $this->userService->userSessionCondominion();

                    //criar conta do usuário no stripe

                    return redirect(route('portal.condominium.create.info'));
                }
            }
        } catch (ValidatorException $e) {

            $response = trans('Erro ao alterar condomínio');

            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function clearUsersCondominium($condominiumId, $userId)
    {
        if (isset($condominiumId)) {
            $users = $this->repository->findWhere([
                'condominium_id' => $condominiumId,
                'user_id' => $userId
            ]);

            if ($users->toArray()) {
                foreach ($users as $row) {
                    $this->userCondominiumService->destroy($row->id);
                }
            }

            return true;
        }

        return false;
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Condomínio excluido com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao excluir o condomínio");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function create(array $data)
    {
        try {
            //verifica condominio já cadastrado
            $condominium = $this->repository->findWhere([
                'zip_code' => $data['zip_code'],
                'address' => $data['address'],
                'number' => $data['number'],
                //  'district' => $data['district'],
                'city_id' => $data['city_id']
            ]);

            if ($condominium->toArray()) {
                //cadastra usuario no condominio
                $users['user_id'] = Auth::user()->id;
                $users['user_role_condominium_id'] = 1;
                $users['condominium_id'] = $condominium[0]->id;
                $users['active'] = 'n';

                $this->userCondominiumService->create($users);
                $this->userService->userSessionCondominion();

                //notificar sindico que existe novo condomino aguardando aprovação de acesso
                $this->notificationNewUser();

                session([
                    'finish' => 'y'
                ]);

                return redirect(route('portal.condominium.create.finish'));
            } else {

                //cadastra condominio e segue nas demais informações do condominio
                $data['finality_id'] = 1;
                $data['user_id'] = Auth::user()->id;

                $data['trial_ends_at'] = Carbon::now()->addDays(15);

                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->create($data);
                if ($dados) {

                    //cadastro do usuario no condominio
                    $users['user_id'] = Auth::user()->id;
                    $users['user_role_condominium_id'] = 1;
                    $users['condominium_id'] = $dados['id'];
                    $users['active'] = 'y';
                    //dd($users);

                    $this->userCondominiumService->create($users);

                    $response = [
                        'message' => 'Condominium add.',
                        'data' => $dados->toArray(),
                    ];

                    $this->userService->userSessionCondominion();

                    return redirect(route('portal.condominium.create.info'));
                }

            }

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function notificationNewUser()
    {
        //busca todos os adm e envia notificação para aprovacao
        $users = $this->userCondominiumRepository->getUserAdm();
        if ($users->toArray()) {

            $communication['name'] = 'Novo usuário para aprovação no condomínio ' . session()->get('name');
            $communication['route'] = route('portal.condominium.user.approval.all');
            foreach ($users as $row) {

                if ($row->id != session()->get('user_condominium_id')) {

                    $communication['condominium_id'] = session()->get('condominium_id');
                    $communication['user_condominium_id'] = $row->id;

                    $this->notificationService->create($communication);
                }
            }

        }

        return true;
    }

    public function updateInfo(array $data)
    {
        if ($data['cnpj'] != '  .   .   /    -  ') {
            if (!$this->utilObjeto->valida_cnpj($data['cnpj'])) {
                $response = trans('CNPJ informado é inválido.');
                return redirect()->back()->withErrors($response)->withInput();
            }
        }

        try {
            if(isset($data['condominium_id'])) {
                $id = $data['condominium_id'];
            }else{
                $id = session()->get('condominium_id');
            }

            $deleteImage = false;
            if(!empty($data['image']) && !empty($data['image'])) {
                $validator = 'png,gif,jpeg';
                $result = $this->utilObjeto->upload($data['image'], $this->path, $validator);
                //dd($result);
                $data['image'] = $result['file'].'.'.$result['extension'];

                $image = $this->getFileName($id);

                //verifica se trocou a imagem
                if (empty($data['image'])) {
                    $data['image'] = $image;
                } else {
                    $deleteImage = true;
                }
            }

            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->update($data, $id);

            if ($dados) {

                if ($deleteImage && !isset($image)) {
                    $image = explode('.', $image);
                    if (!$this->storage->exists($this->path . $image[0])) {
                        $this->storage->delete($this->path . $image[0]);
                    }
                }

                if (isset($data['route']) && $data['route'] == 'edit') {

                    $response = [
                        'message' => 'Informações alteradas com sucesso!',
                        'data' => $dados->toArray(),
                    ];

                    return redirect()->back()->with('status', $response['message']);
                }

                return redirect(route('portal.condominium.create.config'));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function getFileName($id)
    {
        $dados = $this->repository->skipPresenter()->find($id);
        return $dados['image'];
    }

    public function createUnits(array $data)
    {
        try {
            $id = session()->get('condominium_id');

            if ($data['unit_type_id'] == 1 || $data['unit_type_id'] == 4 || $data['unit_type_id'] == 5) { //apartamento
                $this->createApartamentos($data, $id);
            } elseif ($data['unit_type_id'] == 2) { //casa
                $this->createCasa($data, $id);
            } elseif ($data['unit_type_id'] == 3) { //garagem
                $this->createGaragem($data, $id);
            }

            return redirect()->back()->with("Unidades cadastradas com sucesso!")->withInput();

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function createApartamentos($data, $id)
    {
        //CADASTRO BLOCOS
        $nomemclature = $this->blockNomemclatureRepository->getId($data['block_nomemclature_id']);
        $legenda = substr($nomemclature['label'], 0, -1);
        $multiplicador = strlen($data['number_init']);

        if ($multiplicador == 2) {
            $numMul = 10;
        } elseif ($multiplicador == 3) {
            $numMul = 100;
        } elseif ($multiplicador == 4) {
            $numMul = 1000;
        } else {
            $numMul = 10;
        }

        if ($nomemclature['type'] == 'l') {
            $contBlock = 'A';
        } else {
            $contBlock = 1;
        }

        for ($i = 1; $i <= $data['qtde_block']; $i++) {

            if ($nomemclature['type'] == 'l') {
                $block['name'] = $legenda . ' ' . $contBlock;
            } else {
                $block['name'] = $legenda . ' ' . $contBlock;
            }

            $block['condominium_id'] = $id;
            $dadosBlock = $this->blockRepository->create($block);
            if ($dadosBlock) {

                $numeroInit = $data['number_init'];

                $multiplicadorAux = 0;
                for ($andar = 1; $andar <= $data['number_andar']; $andar++) {
                    if ($andar > 1) {
                        $multiplicadorAux += $numMul;
                    }
                    for ($unidade = 1; $unidade <= $data['unidade_andar']; $unidade++) {

                        if ($unidade == 1 && $andar > 1) {
                            $numeroInit = $data['number_init'] + $multiplicadorAux;
                        }

                        if ($unidade == 1) {
                            $nomeAP = $numeroInit;
                        } else {
                            $nomeAP = $numeroInit + 1;
                        }

                        $numeroInit = $nomeAP;
                        $unit['name'] = $nomeAP;
                        $unit['floor'] = $andar;
                        $unit['block_id'] = $dadosBlock['id'];
                        $unit['unit_id'] = 0;
                        $unit['unit_type_id'] = $data['unit_type_id'];
                        $unit['condominium_id'] = session()->get('condominium_id');

                        $dadosUnit = $this->unitRepository->create($unit);
                    }
                }
            }

            $contBlock++;
        }

        return true;
    }

    public function createCasa($data, $id)
    {
        //CADASTRO BLOCOS
        $nomemclature = $this->blockNomemclatureRepository->getId($data['block_nomemclature_id']);
        $legenda = substr($nomemclature['label'], 0, -1);

        if ($nomemclature['type'] == 'l') {
            $contBlock = 'A';
        } else {
            $contBlock = 1;
        }

        for ($i = 1; $i <= $data['qtde_block']; $i++) {

            //cadastrei o bloco
            if ($nomemclature['type'] == 'l') {
                $block['name'] = $legenda . ' ' . $contBlock;
            } else {
                $block['name'] = $legenda . ' ' . $contBlock;
            }

            $block['condominium_id'] = $id;
            $dadosBlock = $this->blockRepository->create($block);
            if ($dadosBlock) {
                $numeroInit = $data['casa_ini'];
                for ($casa = $data['casa_ini']; $casa <= $data['casa_fim']; $casa++) {
                    $nomeAP = '';

                    if ($casa == $data['casa_ini']) {
                        $nomeAP = $data['casa_ini'];
                    } else {
                        $nomeAP = $numeroInit + 1;
                    }

                    $numeroInit = $nomeAP;
                    $unit['name'] = $nomeAP;
                    $unit['block_id'] = $dadosBlock['id'];
                    $unit['unit_id'] = 0;
                    $unit['unit_type_id'] = $data['unit_type_id'];
                    $unit['condominium_id'] = $id;

                    $dadosUnit = $this->unitRepository->create($unit);
                    if ($dadosUnit) {
                    }

                }
            }

            $contBlock++;
        }

        return true;

    }

    public function createGaragem($data, $id)
    {
        $unitType = $this->unitTypeRepository->find($data['unit_type_id']);

        //CADASTRA BLOCO GARAGEM
        $block['name'] = 'Garagem';
        $block['condominium_id'] = $id;
        $dadosBlock = $this->blockRepository->create($block);

        if ($dadosBlock) {
            for ($garagem = 1; $garagem <= $data['number_garagem']; $garagem++) {
                $unit['name'] = $unitType['label'] . ' ' . $garagem;
                $unit['block_id'] = $dadosBlock['id'];
                $unit['unit_id'] = 0;
                $unit['unit_type_id'] = $data['unit_type_id'];
                $unit['condominium_id'] = $id;

                $dadosUnit = $this->unitRepository->create($unit);
                if ($dadosUnit) {
                }
            }
        }

        return true;
    }

    public function clearUnitBlock()
    {
        $this->unitRepository->deleteAllCondominium();
        $this->blockRepository->deleteAllCondominium();

        return true;
    }

}