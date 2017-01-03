<?php

namespace CentralCondo\Http\Controllers\Portal\Home;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\User\UserService;

class HomeController extends Controller
{

    protected $userService;

    protected $condominiumRepository;

    protected $userCondominiumRepository;

    public function __construct(UserService $userService,
                                CondominiumRepository $condominiumRepository,
                                UserCondominiumRepository $userCondominiumRepository)
    {
        $this->userService = $userService;
        $this->condominiumRepository = $condominiumRepository;
        $this->userCondominiumRepository = $userCondominiumRepository;
    }

    public function index()
    {
        $config['title'] = 'Home';

        $condominium_id = session()->get('condominium_id');
        $userCondominiumId = session()->get('user_condominium_id');
        $userRoleCondominiumId = session()->get('user_role_condominium');

        $viewHome = true;
        if (isset($condominium_id)) {
            $viewHome = true;
        } else {
            $dados = $this->userCondominiumRepository->getUserCondominiums();
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
            }
        }

        if($condominium_id){
            $condominium = $this->condominiumRepository->find(session()->get('condominium_id'));
        }

        if ($viewHome) {
            return view('portal.home.index', compact('config', 'condominium', 'userCondominiumId', 'userRoleCondominiumId'));
        }else{
            return view('portal.home.select', compact('config', 'dados'));
        }
    }
}
