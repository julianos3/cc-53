<?php

namespace CentralCondo\Services\Portal\User;

use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\User\UserRepository;
use CentralCondo\Validators\Portal\User\UserValidator;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{

    protected $repository;

    protected $validator;

    protected $filesystem;

    protected $storage;

    protected $usersCondominiumRepository;

    public function __construct(UserRepository $repository,
                                UserValidator $validator,
                                UserCondominiumRepository $usersCondominiumRepository,
                                Filesystem $filesystem,
                                Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->usersCondominiumRepository = $usersCondominiumRepository;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
        $this->condominium_id = session()->get('condominium_id');
        $this->path = 'user' . session()->get('user_id') . '/';
    }

    public function create(array $data)
    {
        try {
            if (!isset($data['user_role_id'])) {
                $data['user_role_id'] = 1;
            }

            if ($this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE)) {
                $data['password'] = bcrypt($data['password']);
                $dados = $this->repository->createUser($data);

                if ($dados) {
                    //cria o auth do usuário cadastrado
                    Auth::login($dados);

                    //cria session do id do condominio
                    //$this->userSessionCondominion();

                    //redireciona
                    return redirect(route('portal.condominium.create'));
                }
            }

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function update(array $data, $id)
    {
        try {
            $path = 'user/' . $id . '/';
            $image = $this->getFileName($id);

            //verifica se trocou a imagem
            if (empty($data['imagem'])) {
                $data['imagem'] = $image;
                $deleteImage = false;
            } else {
                $nameImage = md5(date('ymdsmdys'));
                $extension = $data['imagem']->getClientOriginalExtension();

                $this->storage->put($path . $nameImage, $this->filesystem->get($data['imagem']));
                $data['imagem'] = $nameImage . '.' . $extension;
                $deleteImage = true;
            }

            //formata data de nascimento
            if (isset($data['birth'])) {
                $data['birth'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['birth'])));
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if ($dados) {

                if ($deleteImage && !isset($image)) {
                    $image = explode('.', $image);
                    if (!$this->storage->exists($path . $image[0])) {
                        $this->storage->delete($path . $image[0]);
                    }
                }

                //altera imagem na session se for do proprio usuario
                if (Auth::user()->id == $id) {
                    $this->userSessionCondominion($dados->image);
                }

                $response = trans("Integrante alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            $response = trans("Erro ao alterar o integrante");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function getFileName($id)
    {
        $user = $this->repository->skipPresenter()->find($id);
        return $user['imagem'];
    }

    public function userSessionCondominion()
    {

        //verifica se usuario possui mais de um condominio vinculado
        //se possui mais de um irá para um tela de escolha de condominio
        //se possui 1 irá salvar na session o id do condominio
        //se não possui nenhum condominio vai para a tela de cadastro de condominio

        $usersCondominium = $this->usersCondominiumRepository
            ->with(['user', 'condominium'])
            ->findWhere([
                'user_id' => Auth::user()->id
            ]);

        if (count($usersCondominium) > 1) {
            //multiplos condominios
            //salva todos os condominios na session
            foreach ($usersCondominium as $row) {
                $this->getCondominiumSession($row);
            }

        } elseif (count($usersCondominium) == 1) {
            $this->getCondominiumSession($usersCondominium[0]);
        }

        return true;
    }

    public function getCondominiumSession($dados)
    {
        if ($dados) {
            $image = $this->userSessionImage($dados);

            $admin = 'n';
            if ($this->usersCondominiumRepository->checkAdm($dados->user_role_condominium_id)) {
                $admin = 'y';
            }

            session([
                'user_id' => $dados->user->id,
                'user_condominium_id' => $dados->id,
                'user_role_condominium' => $dados->user_role_condominium_id,
                'condominium_id' => $dados->condominium_id,
                'name' => $dados->condominium->name,
                'active' => $dados->active,
                'image' => $image,
                'admin' => $admin
            ]);

            return true;
        }

        return false;
    }

    public function userSessionImage($dados)
    {
        $image = '';
        if ($this->storage->exists($this->path . $dados->user->image)) {
            $image = $dados->user->imagem;
        }

        if (isset($dados->user->imagem)) {
            $image = route('portal.condominium.user.image', [
                'id' => Auth::user()->id,
                'image' => $dados->user->imagem
            ]);
        } else {
            $image = asset('portal/assets/images/user-not-image.jpg');
        }

        return $image;
    }

    public function updatePassword(array $data)
    {
        $error = [];

        if (crypt($data['password'], Auth::user()->password) === Auth::user()->password) {

        } else {
            $error[] = 'Senha atual incorreta!';
        }

        if ($data['new_password'] != $data['repeat_new_password']) {
            $error[] .= 'A confirmação de senha está incorreta.';
        }

        if (count($error) == 0) {
            try {

                $data['user_role_id'] = Auth::user()->user_role_id;
                $data['name'] = Auth::user()->name;
                $data['email'] = Auth::user()->email;
                $data['sex'] = Auth::user()->sex;
                $data['password'] = bcrypt($data['new_password']);
                $dados = $this->repository->update($data, Auth::user()->id);

                if ($dados) {
                    $this->userSessionCondominion();

                    $response = trans("Senha alterada com sucesso!");
                    return redirect()->back()->with('status', trans($response));
                }

            } catch (ValidatorException $e) {
                $response = trans("Erro ao alterar sua senha");
                return redirect()->back()->withErrors($e->getMessageBag())->withInput();
            }
        } else {
            return redirect()->back()->withErrors($error)->withInput();
        }
    }

    public function addSession($condominiumId)
    {
        $usersCondominium = $this->usersCondominiumRepository
            ->with(['user', 'condominium'])
            ->findWhere([
                'user_id' => Auth::user()->id,
                'condominium_id' => $condominiumId
            ]);

        $usersCondominium = $usersCondominium[0];

        if ($usersCondominium->toArray()) {

            $image = $this->userSessionImage($usersCondominium);
            $admin = 'n';
            if ($this->usersCondominiumRepository->checkAdm($usersCondominium->user_role_condominium_id)) {
                $admin = 'y';
            }

            session([
                'user_id' => $usersCondominium->user->id,
                'user_condominium_id' => $usersCondominium->id,
                'user_role_condominium' => $usersCondominium->user_role_condominium_id,
                'condominium_id' => $usersCondominium->condominium_id,
                'name' => $usersCondominium->condominium->name,
                'active' => $usersCondominium->active,
                'image' => $image,
                'admin' => $admin
            ]);

            return true;
        }

        return false;
    }

    public function getFilePath($id)
    {
        $user = $this->repository->skipPresenter()->find($id);
        return $this->getBaseURL($user);
    }

    public function getBaseURL($user)
    {
        switch ($this->storage->getDefaultDriver()) {
            case 'local':
                return $this->storage->getDriver()->getAdapter()->getPathPrefix()
                    . '/' . $this->getFileName($user['id']);
        }
    }

}