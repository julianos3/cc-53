<?php

namespace CentralCondo\Services\Portal\Condominium\Unit;

use CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRepository;
use CentralCondo\Validators\Portal\Condominium\Unit\UnitValidator;
use Illuminate\Contracts\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class UnitService
{

    protected $repository;

    protected $validator;

    protected $blockRepository;

    protected $userUnitRepository;

    public function __construct(UnitRepository $repository,
                                UnitValidator $validator,
                                BlockRepository $blockRepository,
                                UserUnitRepository $userUnitRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->blockRepository = $blockRepository;
        $this->userUnitRepository = $userUnitRepository;
    }

    public function createGarage(array $data)
    {
        try {
            //verificar se existe bloco de garagem cadastrado e se nao existr criar um para
            //vincular a garagem criada
            $garagem = $this->blockRepository->findWhere([
                'condominium_id' => session()->get('condominium_id'),
                'name' => 'garagem'
            ]);

            if ($garagem->toArray()) {
                $dadosBlock['id'] = $garagem[0]->id;
            } else {
                $block['condominium_id'] = session()->get('condominium_id');
                $block['name'] = 'Garagem';
                $dadosBlock = $this->blockRepository->create($block);
            }
            $data['unit_type_id'] = 3;
            $data['block_id'] = $dadosBlock['id'];
            $data['condominium_id'] = session()->get('condominium_id');

            if (!isset($data['unit_id'])) {
                $data['unit_id'] = 0;
            }

            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Garagem cadastrada com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }

        } catch (ValidatorException $e) {
            $response = trans("Erro ao cadastrar a Garagem");
            return redirect()->back()->withErrors($response)->withInput();
        }

    }

    public function create(array $data)
    {
        try {
            if (!isset($data['unit_id'])) {
                $data['unit_id'] = 0;
            }
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Unidade cadastrada com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            $response = trans("Erro ao cadastrar o unidade");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function update(array $data, $id)
    {
        try {
            if (!isset($data['unit_id'])) {
                $data['unit_id'] = 0;
            }
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = trans("Unidade alterada com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            $response = trans("Erro ao alterar a unidade");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function updateGarage(array $data, $id)
    {
        try {
            $garagem = $this->blockRepository->findWhere([
                'condominium_id' => session()->get('condominium_id'),
                'name' => 'garagem'
            ]);

            if ($garagem->toArray()) {
                $dadosBlock['id'] = $garagem[0]->id;
            } else {
                $block['condominium_id'] = session()->get('condominium_id');
                $block['name'] = 'Garagem';
                $dadosBlock = $this->blockRepository->create($block);
            }
            $data['unit_type_id'] = 3;
            $data['block_id'] = $dadosBlock['id'];
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = trans("Garagem alterada com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            $response = trans("Erro ao alterar a Garagem");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

    public function destroy($id)
    {
        //verifica
        $verifica = $this->userUnitRepository->getUnit($id);
        if ($verifica->toArray()) {
            $response = trans("Erro ao excluir a unidade, existem integrantes vinculados.");
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Unidade excluida com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir a unidade");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

    public function clear($condominiumId)
    {
        $dados = $this->repository->findWhere(['condominium_id' => $condominiumId]);
        if ($dados) {
            foreach ($dados as $row) {
                $this->repository->delete($row->id);
            }
        }

        $response = 'Todas as unidades removidas com sucesso!';

        return redirect()->back()->with('status', trans($response));
    }

}