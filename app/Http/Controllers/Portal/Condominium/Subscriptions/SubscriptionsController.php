<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Subscriptions;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Condominium\Condominium\CondominiumRequest;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\SecurityCam\SecurityCamRepository;
use CentralCondo\Repositories\Portal\Condominium\Subscriptions\SubscriptionsRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Services\Portal\Condominium\SecurityCam\SecurityCamService;
use CentralCondo\Services\Portal\Condominium\Subscriptions\SubscriptionsService;
use CentralCondo\Services\Portal\User\UserService;
use Prettus\Validator\Exceptions\ValidatorException;

class SubscriptionsController extends Controller
{
    /**
     * @var SubscriptionsRepository
     */
    protected $repository;

    /**
     * @var SubscriptionsService
     */
    private $service;

    /**
     * @var CondominiumRepository
     */
    private $condominiumRepository;

    /**
     * @var UnitRepository
     */
    private $unitRepository;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * SubscriptionsController constructor.
     * @param SubscriptionsRepository $repository
     * @param SubscriptionsService $service
     * @param CondominiumRepository $condominiumRepository
     * @param UnitRepository $unitRepository
     * @param UserService $userService
     */
    public function __construct(SubscriptionsRepository $repository,
                                SubscriptionsService $service,
                                CondominiumRepository $condominiumRepository,
                                UnitRepository $unitRepository,
                                UserService $userService)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->condominiumRepository = $condominiumRepository;
        $this->unitRepository = $unitRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $config['title'] = "Assinatura";
        $config['stripe'] = true;
        $config['activeMenu'] = 'condominium';
        //$config['activeMenuN2'] = 'security-cam';

        $units = $this->unitRepository->unitAllCondominium();
        $totalUnits = $units->count();

        if($totalUnits <= 15){
            $valuePlan = '29,90';
            $namePlan = 'Basic';
        }elseif($totalUnits >= 16 && $totalUnits <= 30){
            $valuePlan = '49,90';
            $namePlan = 'Standard';
        }elseif($totalUnits > 30){
            $valuePlan = '79,90';
            $namePlan = 'Standard';
        }

        //dd($units->count());

        //verificar qual plano se encaixa com o condominio
        //formatar o layout da página de assinatura
        //se o usuário já tem assinatura informar os dados respectivos a ela
        //botão para cancelar assinatura
        //botão para resume da assinatura cancelada
        //botão para atualizar assinatura
        //fazer validação de unidades e limites de cadastro conforme o plano escolhido
        $condominium = $this->condominiumRepository->find(session()->get('condominium_id'));

        return view('portal.condominium.subscriptions.index', compact('config', 'condominium', 'valuePlan', 'namePlan'));
    }

    public function store(CondominiumRequest $request)
    {
        $data = $request->all();
        $creditCardToken = $data['stripeToken'];

        $condominium = $this->condominiumRepository->find(session()->get('condominium_id'));

        $nameCondominium = $condominium->name;
        $plan = 'plan2';
        $email = $condominium->user->email;
        $name = $condominium->user->name;

        //dd($nameCondominium);

        try {
            $dados = $condominium->newSubscription($nameCondominium, $plan)->create($creditCardToken, [
                'email' => $email,
                'metadata' => [
                    'First Name' => $name
                ]
            ]);

            $this->userService->userSessionCondominion();

            $response = trans("Assinatura realizada com sucesso!");
            return redirect()->back()->with('status', trans($response));

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }

    }

    public function cancel()
    {
        try {
            //dd()
            $condominium = $user = $this->condominiumRepository->find(session()->get('condominium_id'));
            $condominium->subscription(session()->get('name'))->cancel();

            $response = trans("Assinatura cancelada com sucesso!");
            return redirect()->back()->with('status', trans($response));

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function resume()
    {
        try {
            $condominium = $user = $this->condominiumRepository->find(session()->get('condominium_id'));
            $condominium->subscription(session()->get('name'))->resume();

            $response = trans("Assinatura reativada com sucesso!");
            return redirect()->back()->with('status', trans($response));

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

}
