<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Condominium  ;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Condominium\Condominium\UserCondominiumRequest;
use CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRoleRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserRoleCondominiumRepository;
use CentralCondo\Repositories\Portal\User\UserRepository;
use CentralCondo\Services\Portal\Condominium\Condominium\UserCondominiumService;
use CentralCondo\Services\Portal\User\UserService;
use CentralCondo\Services\Util\UtilObjeto;

class UserCondominiumController extends Controller
{

    /**
     * @var UserCondominiumRepository
     */
    protected $repository;

    /**
     * @var UserCondominiumService
     */
    protected $service;

    /**
     * @var UserRoleCondominiumRepository
     */
    protected $userRoleCondominiumRepository;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var CondominiumRepository
     */
    protected $condominiumRepository;

    /**
     * @var UserUnitRoleRepository
     */
    protected $usersUnitRoleRepository;

    /**
     * @var BlockRepository
     */
    protected $blockRepository;

    /**
     * @var UserUnitRepository
     */
    protected $usersUnitRepository;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    /**
     * UsersCondominiumController constructor.
     * @param UserCondominiumRepository $repository
     * @param UserCondominiumService $service
     * @param UserRoleCondominiumRepository $usersRoleCondominiumRepository
     * @param UserRepository $userRepository
     * @param CondominiumRepository $condominiumRepository
     * @param UserUnitRoleRepository $usersUnitRoleRepository
     * @param BlockRepository $blockRepository
     * @param UserUnitRepository $usersUnitRepository
     * @param UserService $userService
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(UserCondominiumRepository $repository,
                                UserCondominiumService $service,
                                UserRoleCondominiumRepository $usersRoleCondominiumRepository,
                                UserRepository $userRepository,
                                CondominiumRepository $condominiumRepository,
                                UserUnitRoleRepository $usersUnitRoleRepository,
                                BlockRepository $blockRepository,
                                UserUnitRepository $usersUnitRepository,
                                UserService $userService, UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->userRoleCondominiumRepository = $usersRoleCondominiumRepository;
        $this->userRepository = $userRepository;
        $this->condominiumRepository = $condominiumRepository;
        $this->usersUnitRoleRepository = $usersUnitRoleRepository;
        $this->blockRepository = $blockRepository;
        $this->usersUnitRepository = $usersUnitRepository;
        $this->userService = $userService;
        $this->utilObjeto = $utilObjeto;
        $this->condominium_id = session()->get('condominium_id');
    }

    public function index()
    {
        $config['title'] = trans('Integrantes');

        $dados = $this->repository->getAllCondominiumActive();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.condominium.user.index', compact('config', 'dados'));
    }

    public function create()
    {
        $config['title'] = "Novo integrante";
        $role = $this->userRoleCondominiumRepository->getAll();
        $userRole = $this->usersUnitRoleRepository->findWhere(['active' => 'y']);
        $block = $this->blockRepository->getAllCondominium();

        return view('portal.condominium.user.create', compact('config', 'block', 'role', 'userRole'));
    }

    public function store(UserCondominiumRequest $request)
    {
        return $this->service->createUserCondominium($request->all());
    }

    public function show($id)
    {
        $config['title'] = "Perfil Integrante";
        $dados  = $this->repository->getUserCondominiumId($id);

        return view('portal.condominium.user.show', compact('config', 'dados'));
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Integrante";
        $dados  = $this->repository->getUserCondominiumIdUser($id);
        $userRoleCondominium = $dados['user_role_condominium_id'];
        $dados = $dados['user'];
        if($dados['birth'] == '0000-00-00'){
            $dados['birth'] = '';
        }else{
            $dados['birth'] = date('d/m/Y', strtotime($dados['birth']));
        }

        $role = $this->userRoleCondominiumRepository->orderBy('name','asc')->findWhere(['active' => 'y']);

        return view('portal.condominium.user.edit', compact('config', 'dados', 'id', 'role', 'userRoleCondominium'));
    }

    public function update(UserCondominiumRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function unit($id)
    {
        $config['title'] = "Unidades Integrantes";

        //$dados  = $this->repository->getUserCondominiumId($id);

        $dados = $this->repository
            ->with(['userUnit', 'user'])
            ->findWhere([
                'user_id' => $id,
                'condominium_id' => session()->get('condominium_id')
            ]);
        $dados = $dados[0];

        $block = $this->blockRepository->findWhere(['condominium_id' => session()->get('condominium_id')]);
        $userRole = $this->usersUnitRoleRepository->findWhere(['active' => 'y']);
        $userCondominiumId = $dados->id;

        return view('portal.condominium.user.unit', compact('config', 'dados', 'block', 'userRole', 'userCondominiumId'));
    }

    public function userUnitCreate(UserCondominiumRequest $request)
    {
        return $this->service->userUnitCreate($request->all());
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
