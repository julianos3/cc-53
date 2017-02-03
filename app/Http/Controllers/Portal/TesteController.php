<?php

namespace CentralCondo\Http\Controllers\Portal;

use Carbon\Carbon;
use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Subscriptions\SubscriptionsRepository;
use CentralCondo\Services\Portal\Condominium\Subscriptions\SubscriptionsService;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $condominiumRepository;
    protected $subscriptionsService;
    protected $subscriptionsRepository;
    public function __construct(CondominiumRepository $condominiumRepository,
                                SubscriptionsService $subscriptionsService, SubscriptionsRepository $subscriptionsRepository)
    {
        //$this->middleware('auth');
        $this->condominiumRepository = $condominiumRepository;
        $this->subscriptionsService = $subscriptionsService;
        $this->subscriptionsRepository = $subscriptionsRepository;
    }

    public function index()
    {
        $dados = $this->subscriptionsRepository->find(1);

        if ($dados->onGenericTrial()) {
            dd('esta');
        }
        dd('não');
        /*

        $subscriptions['condominium_id'] = $dados->id;
        $subscriptions['trial_ends_at'] = Carbon::now()->addDays(15);

        return $this->subscriptionsService->create($subscriptions);
        */
    }
}
