<?php

namespace CentralCondo\Services\Portal\Manage\ReserveArea;

use CentralCondo\Repositories\Portal\Condominium\Diary\DiaryRepository;
use CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepository;
use CentralCondo\Validators\Portal\Manage\ReserveArea\ReserveAreaValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ReserveAreaService
{

    protected $repository;

    protected $validator;

    protected $diaryRepository;

    public function __construct(ReserveAreaRepository $repository,
                                ReserveAreaValidator $validator,
                                DiaryRepository $diaryRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->diaryRepository = $diaryRepository;
    }

    public function create(array $data)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Recurso Comum cadastrado com sucesso!");
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
                $response = trans("Recurso Comum alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $diary = $this->diaryRepository->findWhere([
            'condominium_id' => session()->get('condominium_id'),
            'reserve_area_id' => $id
        ]);

        if ($diary->toArray()) {
            $response = trans('Existe agenda vinculada a este recurso comum!');
            return redirect()->back()->withErrors($response)->withInput();
        } else {
            $deleted = $this->repository->delete($id);
            if ($deleted) {
                $response = trans("Rescurso Comum excluido com sucesso!");
                return redirect()->back()->with('status', trans($response));
            } else {
                $response = trans("Erro ao excluir o Rescurso Comum");
                return redirect()->back()->withErrors($response)->withInput();
            }
        }
    }

}