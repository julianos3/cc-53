<?php

namespace CentralCondo\Services\Portal\Communication\Called;

use CentralCondo\Repositories\Portal\Communication\Called\CalledHistoricRepository;
use CentralCondo\Repositories\Portal\Communication\Called\CalledRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\Communication\Notification\NotificationService;
use CentralCondo\Validators\Portal\Communication\Called\CalledValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class CalledService
{
    /**
     * @var CalledRepository
     */
    protected $repository;

    /**
     * @var CalledValidator
     */
    protected $validator;

    /**
     * @var CalledHistoricService
     */
    protected $calledHistoricService;

    /**
     * @var CalledHistoricRepository
     */
    protected $calledHistoricRepository;

    /**
     * @var UserCondominiumRepository
     */
    protected $userCodominiumRepository;

    /**
     * @var NotificationService
     */
    protected $notificationService;

    /**
     * CalledService constructor.
     * @param CalledRepository $repository
     * @param CalledValidator $validator
     * @param CalledHistoricService $calledHistoricService
     * @param CalledHistoricRepository $calledHistoricRepository
     * @param UserCondominiumRepository $userCodominiumRepository
     * @param NotificationService $notificationService
     */
    public function __construct(CalledRepository $repository,
                                CalledValidator $validator,
                                CalledHistoricService $calledHistoricService,
                                CalledHistoricRepository $calledHistoricRepository,
                                UserCondominiumRepository $userCodominiumRepository,
                                NotificationService $notificationService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->calledHistoricService = $calledHistoricService;
        $this->calledHistoricRepository = $calledHistoricRepository;
        $this->userCodominiumRepository = $userCodominiumRepository;
        $this->notificationService = $notificationService;
        $this->condominium_id = session()->get('condominium_id');
        $this->user_condominium_id = session()->get('user_condominium_id');
        $this->user_role_condominium = session()->get('user_role_condominium');
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(array $data)
    {
        try {
            $data['called_status_id'] = 1;
            $data['condominium_id'] = session()->get('condominium_id');
            $data['user_condominium_id'] = session()->get('user_condominium_id');

            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {

                //historic register
                $historic['called_id'] = $dados['id'];
                $historic['user_condominium_id'] = $dados['user_condominium_id'];
                $historic['called_status_id'] = $dados['called_status_id'];
                $historic['description'] = $dados['description'];

                $this->calledHistoricService->create($historic);

                //cadastra notificação aos usuarios
                $this->registerNotification($dados['id']);

                $response = [
                    'message' => 'Chamado enviado com sucesso!',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('status', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function update(array $data, $id)
    {
        try {
            //DEVE ALTERAR APENAS O STATUS
            $arrayChamado = $this->repository->find($id);
            $chamado['condominium_id'] = $arrayChamado->condominium_id;
            $chamado['user_condominium_id'] = $arrayChamado->user_condominium_id;
            $chamado['called_category_id'] = $data['called_category_id'];
            $chamado['called_status_id'] = $data['called_status_id'];
            $chamado['subject'] = $arrayChamado->subject;
            $chamado['description'] = $arrayChamado->description;
            $chamado['visible'] = $arrayChamado->visible;

            $this->validator->with($chamado)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($chamado, $id);

            if ($dados) {

                //historic register
                $historic['called_id'] = $dados['id'];
                $historic['user_condominium_id'] = session()->get('user_condominium_id');
                $historic['called_status_id'] = $dados['called_status_id'];
                $historic['description'] = $data['description_historic'];

                $this->calledHistoricService->create($historic);
                $this->registerNotificationUpdate($dados['id'], $dados['user_condominium_id']);

                $response = [
                    'message' => 'Chamado alterado com sucesso!',
                    'data' => $dados->toArray(),
                ];

                return redirect()->to('portal/communication/called')->with('status', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        //excluir historic
        $historic = $this->calledHistoricRepository->findWhere(['called_id' => $id]);
        if ($historic[0]->toArray()) {
            foreach ($historic as $row) {
                $this->calledHistoricService->destroy($row->id);
            }
        }

        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Chamado removido com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao remover Chamado!");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function registerNotification($calledId)
    {
        if (isset($calledId)) {

            $users = $this->userCodominiumRepository->getUserAdm();
            if($users->toArray()){

                $communication['name'] = 'Novo chamado #' . $calledId;
                $communication['route'] = route('portal.communication.called.view', ['id' => $calledId]);
                foreach($users as $row){

                    $communication['condominium_id'] = session()->get('condominium_id');
                    $communication['user_condominium_id'] = $row->id;

                    $this->notificationService->create($communication);
                }

                return true;
            }
            return false;
        }
        return false;
    }

    public function registerNotificationUpdate($calledId, $userCondominiumId)
    {
        if(isset($calledId) && isset($userCondominiumId)){
            $communication['name'] = 'Nova interação no chamado #' . $calledId;
            $communication['route'] = route('portal.communication.called.view', ['id' => $calledId]);
            $communication['condominium_id'] = session()->get('condominium_id');
            $communication['user_condominium_id'] = $userCondominiumId;

            $this->notificationService->create($communication);
        }
        return false;
    }

}