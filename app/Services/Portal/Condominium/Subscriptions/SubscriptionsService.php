<?php

namespace CentralCondo\Services\Portal\Condominium\Subscriptions;

use Carbon\Carbon;
use CentralCondo\Repositories\Portal\Condominium\SecurityCam\SecurityCamRepository;
use CentralCondo\Repositories\Portal\Condominium\Subscriptions\SubscriptionsRepository;
use CentralCondo\Validators\Portal\Condominium\SecurityCam\SecurityCamValidator;
use CentralCondo\Validators\Portal\Condominium\Subscriptions\SubscriptionsValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class SubscriptionsService
{

    protected $repository;

    protected $validator;

    protected $stripeService;

    public function __construct(SubscriptionsRepository $repository,
                                SubscriptionsValidator $validator,
                                StripeService $stripeService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->stripeService = $stripeService;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
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