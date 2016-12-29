<?php

namespace CentralCondo\Http\Controllers\Portal\Home;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        //dd(session()->get('admin'));

        if(!isset($condominium_id)) {

            $dados = $this->userCondominiumRepository->getUserCondominiums();
            if($dados->toArray()){
                $this->userService->userSessionCondominion();
            }else{
                return redirect()->route('portal.condominium.create');
            }

        }

        $condominium = $this->condominiumRepository->find(session()->get('condominium_id'));

        return view('portal.home.index', compact('config', 'condominium', 'userCondominiumId', 'userRoleCondominiumId'));
    }
}
