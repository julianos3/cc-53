<?php

namespace CentralCondo\Http\Controllers\Portal\Home;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Services\Portal\User\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $userService;

    protected $condominiumRepository;

    public function __construct(UserService $userService, CondominiumRepository $condominiumRepository)
    {
        $this->userService = $userService;
        $this->condominiumRepository = $condominiumRepository;
    }

    public function index()
    {
        $config['title'] = 'Home';

        $condominium_id = session()->get('condominium_id');
        $userCondominiumId = session()->get('user_condominium_id');
        $userRoleCondominiumId = session()->get('user_role_condominium_id');


        if(!isset($condominium_id)) {
            $this->userService->userSessionCondominion();
        }

        //dd(session()->get('condominium_id'));

        $condominium = $this->condominiumRepository->find(session()->get('condominium_id'));
        //dd(session()->get('condominium_id'));

        return view('portal.home.index', compact('config', 'condominium', 'userCondominiumId', 'userRoleCondominiumId'));
    }
}
