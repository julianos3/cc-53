<?php

namespace CentralCondo\Services\Portal\User;

use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\User\UserRepository;
use CentralCondo\Validators\Portal\User\UserValidator;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $this->path = 'user/' . session()->get('user_id') . '/';
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

    public function userSessionImage($image)
    {
        session([
            'image' => route('portal.condominium.user.image', [
                'id' => Auth::user()->id,
                'image' => $image
            ]),
        ]);
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
            $cont = 0;
            foreach ($usersCondominium as $row) {
                $cont++;
                //dd('revisar User Service -> userSessionCondominion()');
                if ($this->storage->exists($this->path . $row->user->image)) {
                    $image = $row->user->imagem;
                } else {
                    $image = 'avatar.jpg';
                }

                session([
                    'user_id' => $row->user->id,
                    'user_condominium_id' => $row->id,
                    'user_role_condominium' => $row->user_role_condominium_id,
                    'condominium_id' => $row->condominium_id,
                    'name' => $row->condominium->name,
                    'active' => $row->active,
                    'image' => route('portal.condominium.user.image', [
                        'id' => Auth::user()->id,
                        'image' => $image
                    ]),
                ]);
            }

        } elseif (count($usersCondominium) == 1) {

            $usersCondominium = $usersCondominium[0];
            if ($this->storage->exists($this->path . $usersCondominium->user->image)) {
                $image = $usersCondominium->user->imagem;
            } else {
                $image = 'avatar.jpg';
            }

            session([
                'user_id' => $usersCondominium->user->id,
                'user_condominium_id' => $usersCondominium->id,
                'user_role_condominium' => $usersCondominium->user_role_condominium_id,
                'condominium_id' => $usersCondominium->condominium_id,
                'name' => $usersCondominium->condominium->name,
                'active' => $usersCondominium->active,
                'image' => route('portal.condominium.user.image', [
                    'id' => Auth::user()->id,
                    'image' => $image
                ]),
            ]);
        }

        return true;
    }

    public function addSession($condominiumId)
    {

        //dd(Session::getId());
        //dd(session()->all());
        //dd('adicionar id na session para poder apagar e adicionar outra para as consultas');
        //dd(session()->get());
        $usersCondominium = $this->usersCondominiumRepository
            ->with(['user', 'condominium'])
            ->findWhere([
                'user_id' => Auth::user()->id,
                'condominium_id' => $condominiumId
            ]);
        $usersCondominium = $usersCondominium[0];

        if($usersCondominium->toArray()){

            if ($this->storage->exists($this->path . $usersCondominium->user->imagem)) {
                $image = $usersCondominium->user->imagem;
            } else {
                $image = 'avatar.jpg';
            }

            session([
                'user_id' => $usersCondominium->user->id,
                'user_condominium_id' => $usersCondominium->id,
                'user_role_condominium' => $usersCondominium->user_role_condominium,
                'condominium_id' => $usersCondominium->condominium_id,
                'name' => $usersCondominium->condominium->name,
                'active' => $usersCondominium->active,
                'image' => route('portal.condominium.user.image', [
                    'id' => Auth::user()->id,
                    'image' => $image
                ]),
            ]);

            ////dd(session()->get('condominium_id'));

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