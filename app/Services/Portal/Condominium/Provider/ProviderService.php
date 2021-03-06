<?php

namespace CentralCondo\Services\Portal\Condominium\Provider;

use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepository;
use CentralCondo\Repositories\Portal\Manage\Contract\ContractRepository;
use CentralCondo\Validators\Portal\Condominium\Provider\ProviderValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ProviderService
{

    protected $repository;

    protected $validator;

    protected $contractRepository;

    public function __construct(ProviderRepository $repository,
                                ProviderValidator $validator,
                                ContractRepository $contractRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->contractRepository = $contractRepository;
    }

    public function createAjax(array $data)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);

            if ($dados) {
                return response()->json([
                    'success' => true,
                    'message' => 'Registro adicionado com sucesso!',
                    'data' => $dados->toArray(),
                ]);
            }

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function create(array $data)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Fornecedor cadastrado com sucesso!");
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
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = trans("Fornecedor alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $contract = $this->contractRepository->findWhere(['provider_id' => $id]);
        if ($contract->toArray()) {
            $response = trans('Não é possível exluir este fonecedor, existe contratos vinculados ao mesmo!');
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            $response = trans("Fornecedor removido com sucesso!");
            return redirect()->back()->with('status', trans($response));
        }
    }

}