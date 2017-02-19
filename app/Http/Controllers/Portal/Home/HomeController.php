<?php

namespace CentralCondo\Http\Controllers\Portal\Home;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Communication\Called\CalledRepository;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Subscriptions\SubscriptionsRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Repositories\Portal\Manage\Contract\ContractRepository;
use CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepository;
use CentralCondo\Services\Portal\User\UserService;
use CentralCondo\Services\Util\UtilObjeto;

class HomeController extends Controller
{

    protected $userService;

    protected $condominiumRepository;

    protected $userCondominiumRepository;

    protected $maintenanceRepository;

    protected $calledRepository;

    protected $userCommunicationRepository;

    protected $contractRepository;

    protected $subscriptionsRepository;

    protected $utilObjeto;

    protected $unitRepository;

    public function __construct(UserService $userService,
                                CondominiumRepository $condominiumRepository,
                                UserCondominiumRepository $userCondominiumRepository,
                                MaintenanceRepository $maintenanceRepository,
                                CalledRepository $calledRepository,
                                UserCommunicationRepository $userCommunicationRepository,
                                ContractRepository $contractRepository,
                                SubscriptionsRepository $subscriptionsRepository,
                                UnitRepository $unitRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->userService = $userService;
        $this->condominiumRepository = $condominiumRepository;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->maintenanceRepository = $maintenanceRepository;
        $this->calledRepository = $calledRepository;
        $this->userCommunicationRepository = $userCommunicationRepository;
        $this->contractRepository = $contractRepository;
        $this->subscriptionsRepository = $subscriptionsRepository;
        $this->unitRepository = $unitRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = 'Home';
        $config['activeMenu'] = 'home';

        $condominium_id = session()->get('condominium_id');
        $userCondominiumId = session()->get('user_condominium_id');
        $userRoleCondominiumId = session()->get('user_role_condominium');

        $viewHome = true;
        if (isset($condominium_id)) {
            $viewHome = true;
        } else {
            $dados = $this->userCondominiumRepository->getUserCondominiumsActive();
            if ($dados->toArray()) {
                $total = $dados->count();
                if ($total == 1) {
                    //add session unica que o usuario tem
                    $this->userService->getCondominiumSession($dados[0]);

                    $condominium_id = session()->get('condominium_id');
                    $userCondominiumId = session()->get('user_condominium_id');
                    $userRoleCondominiumId = session()->get('user_role_condominium');

                } else {
                    //chama view e modal para escolha do condominio para acessar
                    $viewHome = false;
                }
            } else {
                $this->userService->addSessionUser();
                return redirect()->to(route('portal.condominium.create'));
            }
        }

        if ($condominium_id) {
            $condominium = $this->condominiumRepository->find(session()->get('condominium_id'));
        }

        if ($viewHome) {

            $messagePerfil = $this->messagePerfil($condominium);

            $agenda = '';
            $maintenance = '';
            //dd( Carbon::now()->month(2));
            $contract = $this->contractRepository->getContractToWin();
            $called = $this->utilObjeto->paginate($this->calledRepository->getAllCondominium(), 5);
            $communication = $this->utilObjeto->paginate($this->userCommunicationRepository->getAllCondominium(), 5);
            $subscriptions = $this->subscriptionsRepository->findWhere(['condominium_id' => $condominium_id]);
            if ($subscriptions->toArray()) {
                $subscriptions = $subscriptions[0];
            }
            $usersForActive = $this->userCondominiumRepository->getUserCondominiumsNotActive();
            $forum = '';
            $muralDeRecados = '';
            $assembleia = '';

            return view('portal.home.index', compact('config', 'usersForActive', 'messagePerfil', 'subscriptions', 'condominium', 'userCondominiumId', 'userRoleCondominiumId', 'called', 'communication', 'contract'));
        } else {
            return view('portal.home.select', compact('config', 'dados'));
        }
    }

    public function messagePerfil($condominium)
    {
        $message = [];
        $cont = 0;
        if (!isset($condominium->name)) {
            $cont++;
            $message[$cont]['message'] = 'É necessário adicionar um nome ao seu condomínio em seu cadastro.';
            $message[$cont]['route'] = route('portal.condominium.edit', ['id' => $condominium->id]);
        }

        $units = $this->unitRepository->getAllCondominium();
        if (!$units->toArray()) {
            $cont++;
            $message[$cont]['message'] = 'Adicione unidades ao seu condomínio.';
            $message[$cont]['route'] = route('portal.condominium.unit.create');
        }

        return $message;
    }

}
