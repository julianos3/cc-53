<?php

namespace CentralCondo\Services\Portal\Condominium\Group;

use CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepository;
use CentralCondo\Validators\Portal\Condominium\Group\UserGroupCondominiumValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class UserGroupCondominiumService
{

    /**
     * @var UserGroupCondominiumRepository
     */
    protected $repository;

    /**
     * @var UserGroupCondominiumValidator
     */
    protected $validator;

    public function __construct(UserGroupCondominiumRepository $repository,
                                UserGroupCondominiumValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->condominium_id = session()->get('condominium_id');
    }

    public function createArray(array $data)
    {
        if(is_array($data['users'])){
            foreach ($data['users'] as $user){
                $verifica = '';
                $verifica = $this->repository->findWhere([
                    'user_condominium_id' => $user,
                    'group_id' => $data['group_id']
                ]);

                if($verifica->isEmpty()){

                    $dataUser['user_condominium_id'] = $user;
                    $dataUser['user_condominium_id'] = $user;
                    $dataUser['group_id'] = $data['group_id'];

                    $this->validator->with($dataUser)->passesOrFail();
                    $dados = $this->repository->create($dataUser);

                }
            }
        }

        $response = trans("Integrantes adicionados com sucesso!");
        return redirect()->back()->with('status', trans($response));
    }

    public function create(array $data)
    {
        //verifica se integrante ja esta cadastrado no grupo
        $verifica = $this->repository->findWhere([
            'user_condominium_id' => $data['user_condominium_id'],
            'group_id' => $data['group_id']
        ]);

        if(!$verifica->isEmpty()){
            $response = trans("Integrante já adicionado a este grupo");
            return redirect()->back()->withErrors($response)->withInput();
        }else {
            try {
                $this->validator->with($data)->passesOrFail();
                $dados = $this->repository->create($data);
                if ($dados) {
                    $response = trans("Integrantes cadastrado com sucesso!");
                    return redirect()->back()->with('status', trans($response));
                }
            } catch (ValidatorException $e) {
                $response = trans("Erro ao cadastrar o integrante");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Integrante excluido com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao excluir o integrante");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

}