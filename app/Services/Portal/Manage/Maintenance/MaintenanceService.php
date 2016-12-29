<?php

namespace CentralCondo\Services\Portal\Manage\Maintenance;

use CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepository;
use CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepository;
use CentralCondo\Validators\Portal\Manage\Maintenance\MaintenanceValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class MaintenanceService
{

    protected $repository;

    protected $validator;

    protected $maintenanceCompletedRepository;

    public function __construct(MaintenanceRepository $repository,
                                MaintenanceValidator $validator,
                                MaintenanceCompletedRepository $maintenanceCompletedRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->maintenanceCompletedRepository = $maintenanceCompletedRepository;
    }

    public function create(array $data)
    {
        try {
            $data['user_condominium_id'] = session()->get('user_condominium_id');
            $data['condominium_id'] = session()->get('condominium_id');
            $data['start_date'] = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data['start_date'])));
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Manutenção Preventiva cadastrado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function update(array $data, $id)
    {
        try {
            $data['user_condominium_id'] = session()->get('user_condominium_id');
            $data['condominium_id'] = session()->get('condominium_id');
            $data['start_date'] = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data['start_date'])));
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = trans("Manutenção Preventiva alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $completed = $this->maintenanceCompletedRepository->findWhere(['maintenance_id' => $id]);
        if ($completed->toArray()) {
            $response = trans("Não é possível excluir a Manutenção Preventiva pois existem registros vinculados a mesma!");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Manutenção Prevenvita excluido com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir a Manutenção Preventiva");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

}