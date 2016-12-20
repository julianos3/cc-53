<?php

namespace CentralCondo\Services\Portal\Condominium\Condominium;

use CentralCondo\Events\Portal\Condominium\User\SendMailAddCondominium;
use CentralCondo\Events\Portal\User\SendMailNewUserWellcome;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRepository;
use CentralCondo\Repositories\Portal\User\UserRepository;
use CentralCondo\Services\Portal\Condominium\Unit\UserUnitService;
use CentralCondo\Services\Portal\User\UserService;
use CentralCondo\Validators\Portal\Condominium\Condominium\UserCondominiumValidator;
use Event;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserCondominiumService
{

    protected $repository;

    protected $validator;

    protected $userRepository;

    protected $usersUnitRepository;

    protected $usersUnitService;

    protected $userService;

    public function __construct(UserCondominiumRepository $repository,
                                UserCondominiumValidator $validator,
                                UserRepository $userRepository,
                                UserUnitRepository $usersUnitRepository,
                                UserUnitService $usersUnitService,
                                UserService $userService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
        $this->usersUnitRepository = $usersUnitRepository;
        $this->usersUnitService = $usersUnitService;
        $this->userService = $userService;
        $this->condominium_id = session()->get('condominium_id');
    }

    public function create(array $data)
    {
        $verifica = $this->repository->findWhere([
            'user_id' => $data['user_id'],
            'condominium_id' => $data['condominium_id']
        ]);

        if ($verifica->toArray()) {
            $response = trans("Usuário já cadastrado neste condominio");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            try {

                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->create($data);

                if ($dados) {
                    $response = trans("Integrante cadastrado com sucesso!");
                    return redirect()->back()->with('status', trans($response));
                }

            } catch (ValidatorException $e) {
                $response = trans("Erro ao cadastrar o integrante");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

    public function update(array $data, $id)
    {
        $usersCondominium = $this->repository->getUserCondominiumId($id);
        //dd($usersCondominium);
        if ($usersCondominium->toArray()) {
            if ($this->updateRoleCondominium($usersCondominium->id, $usersCondominium->user_id, $data['user_role_condominium_id'])) {
                return $this->userService->update($data, $usersCondominium->user_id);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateRoleCondominium($id, $userId, $roleCondominiumId)
    {
        $data['user_id'] = $userId;
        $data['user_role_condominium_id'] = $roleCondominiumId;
        $data['condominium_id'] = session()->get('condominium_id');
        $data['active'] = 'y';
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                return true;
            }
        } catch (ValidatorException $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        //verifica se existe unidades vinculadas ao usuário
        $usersUnit = '';
        $usersUnit = $this->usersUnitRepository->findWhere([
            'user_condominium_id' => $id
        ]);

        if ($usersUnit->toArray()) {
            $response = trans("Erro ao excluir o integrante do condomínio, existem unidades vinculadas.");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Integrante do condomínio excluido com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir o integrante do condomínio");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

    public function createUserCondominium($data)
    {
        //verifica se usuário já existe no central condo
        $verificaCondominium = '';
        $verificaUser = $this->userRepository->findWhere(['email' => $data['email'], 'user_role_id' => 1]);
        if ($verificaUser->toArray()) {
            $user = $verificaUser[0];

            //verifica se usuario encontrado já esta vinculado a este condominio
            $verificaCondominium = $this->repository->findWhere([
                'user_id' => $user->id,
                'condominium_id' => session()->get('condominium_id')
            ]);
        }

        if (!isset($verificaCondominium)) {
            $response = trans("Usuário já cadastrado neste condominio");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            try {

                if (!$verificaUser->toArray()) {
                    //cadastra usuario e envia e-mail com os acessos ao sistema
                    //gerar uma senha automatica
                    $data['user_role_id'] = 1;
                    $password = $this->generatePassword();
                    $data['password'] = $password;
                    $data['password_confirmed'] = $password;

                    $data['password'] = bcrypt($data['password']);
                    $data['password_confirmation'] = bcrypt($data['password_confirmed']);

                    $user = $this->userRepository->createUser($data);

                    if ($user) {
                        $this->newUserMail($user['email'], $password);
                    }

                } else {
                    //envia email informando que o mesmo foi adicionado em outro condominio
                    //está mais abaixo
                }

                //cadastra usuario no condominio
                $data['condominium_id'] = session()->get('condominium_id');
                $data['user_id'] = $user->id;
                $data['active'] = 'y';


                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->create($data);

                if ($dados) {

                    //cadastra users_unit
                    if (!empty($data['unit_id']) && !empty($data['user_unit_role'])) {
                        $usersUnit['user_condominium_id'] = $dados['id'];
                        $usersUnit['unit_id'] = $data['unit_id'];
                        $usersUnit['user_unit_role'] = $data['user_unit_role'];

                        $this->usersUnitRepository->create($usersUnit);
                    }

                    if ($verificaUser->toArray()) {
                        $this->newCondominiumUserMail($dados['id']);
                    } else {
                        $this->newUserMail($dados['id'], $password);
                    }

                    $response = trans("Integrante cadastrado com sucesso!");
                    return redirect()->back()->with('status', trans($response));
                }

            } catch (ValidatorException $e) {
                $response = trans("Erro ao cadastrar o integrante");
                return redirect()->back()->withErrors($e->getMessageBag())->withInput();
            }
        }
    }

    public function generatePassword($tamanho = 6, $maiusculas = true, $numeros = true, $simbolos = false)
    {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }

        return $retorno;
    }

    public function newUserMail($userCondominiumId, $password)
    {
        Event::fire(new SendMailNewUserWellcome($userCondominiumId, $password));
    }

    public function newCondominiumUserMail($userCondominiumId)
    {
        Event::fire(new SendMailAddCondominium($userCondominiumId));
    }

    public function userUnitCreate(array $data)
    {
        //verifica se unidade já esta vinculada a este usuario do condominio
        $verifica = $this->usersUnitRepository->findWhere([
            'user_condominium_id' => $data['user_condominium_id'],
            'unit_id' => $data['unit_id']
        ]);

        if ($verifica->toArray()) {
            $response = trans('Unidade já vinculada ao integrante');
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $this->usersUnitService->create($data);
            $response = trans("Unidade cadastrada com sucesso!");
            return redirect()->back()->with('status', trans($response));
        }
    }

}