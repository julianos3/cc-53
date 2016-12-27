<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Condominium;

use CentralCondo\Events\Portal\User\SendMailWellcome;
use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Condominium\Condominium\CondominiumRequest;
use CentralCondo\Repositories\Portal\CityRepository;
use CentralCondo\Repositories\Portal\Condominium\Block\BlockNomemclatureRepository;
use CentralCondo\Repositories\Portal\Condominium\Block\BlockRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserRoleCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Finality\FinalityRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UnitTypeRepository;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRoleRepository;
use CentralCondo\Repositories\Portal\StateRepository;
use CentralCondo\Services\Portal\Condominium\Condominium\CondominiumService;
use CentralCondo\Services\Portal\Condominium\Condominium\UserCondominiumService;
use CentralCondo\Services\Portal\Condominium\Unit\UserUnitService;
use CentralCondo\Services\Portal\User\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class CondominiumController extends Controller
{

    protected $repository;

    protected $stateRepository;

    protected $service;

    protected $finalityRepository;

    protected $unitTypeRepository;

    protected $blockRepository;

    protected $blockNomemclatureRepository;

    protected $unitRepository;

    protected $userRoleCondominiumRepository;

    protected $userUnitRoleRepository;

    protected $userCondominiumRepostory;

    protected $userCondominiumService;

    protected $userUnitService;

    protected $userService;

    protected $cityRepository;

    public function __construct(CondominiumRepository $repository,
                                CondominiumService $service,
                                StateRepository $stateRepository,
                                FinalityRepository $finalityRepository,
                                UnitTypeRepository $unitTypeRepository,
                                BlockRepository $blockRepository,
                                BlockNomemclatureRepository $blockNomemclatureRepository,
                                UnitRepository $unitRepository,
                                UserRoleCondominiumRepository $userRoleCondominiumRepository,
                                UserUnitRoleRepository $userUnitRoleRepository,
                                UserCondominiumRepository $userCondominiumRepository,
                                UserCondominiumService $userCondominiumService,
                                UserUnitService $userUnitService,
                                UserService $userService,
                                CityRepository $cityRepository)
    {
        $this->repository = $repository;
        $this->stateRepository = $stateRepository;
        $this->service = $service;
        $this->finalityRepository = $finalityRepository;
        $this->unitTypeRepository = $unitTypeRepository;
        $this->blockRepository = $blockRepository;
        $this->blockNomemclatureRepository = $blockNomemclatureRepository;
        $this->unitRepository = $unitRepository;
        $this->userRoleCondominiumRepository = $userRoleCondominiumRepository;
        $this->userUnitRoleRepository = $userUnitRoleRepository;
        $this->userCondominiumRepostory = $userCondominiumRepository;
        $this->userCondominiumService = $userCondominiumService;
        $this->userUnitService = $userUnitService;
        $this->userService = $userService;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $config['title'] = 'Meus Condomínios';
        $dados = $this->userCondominiumRepostory->getUserCondominiums();

        return view('portal.condominium.index', compact('dados', 'config'));
    }

    public function create()
    {
        $config['title'] = "Novo condomínio";
        $config['menu'] = 'off';
        $config['notification'] = 'off';
        $config['message'] = 'off';

        $state = $this->stateRepository->orderBy('name', 'asc')->all();

        return view('portal.condominium.create.index', compact('state', 'config'));
    }

    public function store(CondominiumRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function createInfo()
    {
        $config['title'] = "Informação do condomínio";
        $config['menu'] = 'off';
        $config['notification'] = 'off';
        $config['message'] = 'off';

        $dados = $this->repository->getCondominium();
        $finality = $this->finalityRepository->getAll();

        return view('portal.condominium.create.info', compact('config', 'finality', 'dados'));
    }

    public function updateInfo(CondominiumRequest $request)
    {
        return $this->service->updateInfo($request->all());
    }

    public function createConfig()
    {
        $config['title'] = "Condiguração do condomínio";
        $config['menu'] = 'off';
        $config['notification'] = 'off';
        $config['message'] = 'off';

        $dados = $this->repository->getCondominium();
        $unitType = $this->unitTypeRepository->getAll();
        $blockNomemclature = $this->blockNomemclatureRepository->getAll();
        $unit = $this->unitRepository->getAllCondominium();

        return view('portal.condominium.create.config', compact('config', 'dados', 'unitType', 'unit', 'blockNomemclature'));
    }

    public function createUnit(CondominiumRequest $request)
    {
        return $this->service->createUnits($request->all());
    }

    public function clearUnitBlock()
    {
        if ($this->service->clearUnitBlock()) {
            $response = 'Todas as unidades removidas com sucesso!';
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = 'Erro inesperado ao remover unidades!';
            return redirect()->back()->withErrors(trans($response))->withInput();
        }
    }

    public function finish()
    {
        $config['title'] = "Conclusão de cadastro do condomínio";
        $config['menu'] = 'off';
        $config['notification'] = 'off';
        $config['message'] = 'off';

        $userRole = $this->userRoleCondominiumRepository->getAll();
        $block = $this->blockRepository->getAllCondominium();
        $userUnitRole = $this->userUnitRoleRepository->getAll();
        $dados = $this->repository->getCondominium();

        return view('portal.condominium.create.finish', compact('config', 'dados', 'userRole', 'block', 'userUnitRole'));
    }

    public function finishStore(CondominiumRequest $request)
    {
        $data = $request->all();

        $userCondominiumId = $this->userCondominiumRepostory->getUserCondominium();

        //adicionar nivel | users condominium -> user_role_id
        $user['user_id'] = Auth::user()->id;
        $user['user_role_condominium_id'] = $data['user_role_condominium_id'];
        $user['condominium_id'] = $userCondominiumId['condominium_id'];

        $this->userCondominiumService->update($user, $userCondominiumId->id);

        Event::fire(new SendMailWellcome($userCondominiumId->id));

        $unit['user_condominium_id'] = $userCondominiumId->id;
        $unit['unit_id'] = $data['unit_id'];
        $unit['user_unit_role_id'] = $data['user_unit_role_id'];

        $this->userUnitService->create($unit);

        return redirect(route('portal.home.index'));
    }

    public function access($id)
    {
        if ($this->userService->addSession($id)) {
            return redirect(route('portal.home.index'));
        } else {
            return redirect(route('portal.condominium.index'));
        }
    }

    public function edit($id)
    {
        $config['title'] = 'Editar condomínio';

        $dados = $this->repository->getCondominiumId($id);
        $state = $this->stateRepository->orderBy('name', 'asc')->all();
        $city = $this->cityRepository->listCityState($dados->city->state_id);
        $finality = $this->finalityRepository->getAll();

        return view('portal.condominium.edit.edit', compact('config', 'dados', 'state', 'city', 'finality'));
    }

}
