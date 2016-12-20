<?php

namespace CentralCondo\Services\Portal\Condominium\SecurityCam;

use CentralCondo\Repositories\Portal\Condominium\SecurityCam\SecurityCamRepository;
use CentralCondo\Validators\Portal\Condominium\SecurityCam\SecurityCamValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class SecurityCamService
{

    protected $repository;

    protected $validator;

    public function __construct(SecurityCamRepository $repository, SecurityCamValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = trans("Câmera de segurança cadastrada com sucesso!");
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
                $response = trans("Câmera de segurança alterado com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Câmera de segurança excluida com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao excluir a câmera de segurança");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

}