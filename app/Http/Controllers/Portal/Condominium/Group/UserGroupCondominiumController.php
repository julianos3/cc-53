<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Group;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\Condominium\Group\UserGroupCondominiumService;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Condominium\Group\UserGroupCondominiumRequest;
use CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepository;
use CentralCondo\Services\Util\UtilObjeto;
use CentralCondo\Http\Controllers\Controller;

class UserGroupCondominiumController extends Controller
{
    /**
     * @var UserGroupCondominiumRepository
     */
    protected $repository;

    /**
     * @var UserGroupCondominiumService
     */
    private $service;

    /**
     * @var UserCondominiumRepository
     */
    private $userCondominiumRepository;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * UserGroupCondominiumController constructor.
     * @param UserGroupCondominiumRepository $repository
     * @param UserGroupCondominiumService $service
     * @param UserCondominiumRepository $userCondominiumRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(UserGroupCondominiumRepository $repository,
                                UserGroupCondominiumService $service,
                                UserCondominiumRepository $userCondominiumRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->utilObjeto = $utilObjeto;
        $this->condominium_id = session()->get('condominium_id');
    }

    public function index($groupId)
    {
        $config['title'] = "Integrantes do Grupo";

        $dados = $this->repository->getAllGroupCondominium($groupId);
        $dados = $this->utilObjeto->paginate($dados);

        $usersCondominium = $this->userCondominiumRepository->getAllCondominiumActive();

        return view('portal.condominium.group.user.index', compact('config', 'dados', 'groupId', 'usersCondominium'));
    }

    public function create($groupId)
    {
        $config['title'] = "Cadastrar integrante no Grupo";
        $usersCondominium = $this->userCondominiumRepository->getAllCondominiumActive();

        return view('portal.condominium.group.user.create', compact('config', 'usersCondominium', 'groupId'));
    }

    public function store(UserGroupCondominiumRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function destroy($groupId, $id)
    {
        return $this->service->destroy($id);
    }
}
