<?php

namespace CentralCondo\Services\Portal\Condominium\Block;

use CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Validators\Portal\Condominium\Block\BlockValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class BlockService
{

    protected $repository;

    protected $validator;

    protected $unitRepository;

    public function __construct(BlockRepository $repository,
                                BlockValidator $validator,
                                UnitRepository $unitRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->unitRepository = $unitRepository;
    }

    public function create(array $data)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Bloco cadastrado com sucesso!");
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
                $response = trans("Bloco alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function clearBlockNull()
    {
        $dados = $this->repository->findWhere([
            'condominium_id' => session()->get('condominium_id')
        ]);
        if ($dados->toArray()) {
            foreach ($dados as $row) {
                $unit = $this->unitRepository->findWhere(['block_id' => $row->id]);
                if (!$unit->toArray()) {
                    $this->repository->delete($row->id);
                }
            }
        }

        return true;
    }

    public function destroy($id)
    {
        $unit = $this->unitRepository->findWhere(['block_id' => $id]);
        if ($unit->toArray()) {
            $response = trans("Erro ao excluir o bloco, existem unidades vinculadas");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Bloco excluido com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir o bloco");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

}