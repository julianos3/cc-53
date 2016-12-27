<?php

namespace CentralCondo\Services\Portal\Condominium\Group;

use CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepository;
use CentralCondo\Validators\Portal\Condominium\Group\GroupCondominiumValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class GroupCondominiumService
{

    protected $repository;

    protected $validator;

    protected $userGroupCondominiumRepository;

    public function __construct(GroupCondominiumRepository $repository,
                                GroupCondominiumValidator $validator,
                                UserGroupCondominiumRepository $userGroupCondominiumRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userGroupCondominiumRepository = $userGroupCondominiumRepository;
    }

    public function create(array $data)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Grupo cadastrado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function update(array $data, $id)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = trans("Grupo alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        //excluir integrantes do grupo
        $usersGroup = $this->userGroupCondominiumRepository->findWhere(['group_id' => $id]);
        if ($usersGroup->toArray()) {
            $response = trans("Não é possivel excluir o grupo, existem integrantes vinculados no mesmo!");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Grupo excluido com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir o grupo");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

}