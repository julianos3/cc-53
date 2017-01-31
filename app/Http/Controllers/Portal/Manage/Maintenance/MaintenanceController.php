<?php

namespace CentralCondo\Http\Controllers\Portal\Manage\Maintenance;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Manage\Maintenance\MaintenanceRequest;
use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepository;
use CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceRepository;
use CentralCondo\Repositories\Portal\Manage\Periodicity\PeriodicityRepository;
use CentralCondo\Services\Portal\Manage\Maintenance\MaintenanceService;
use CentralCondo\Services\Util\UtilObjeto;

class MaintenanceController extends Controller
{
    /**
     * @var MaintenanceRepository
     */
    protected $repository;

    /**
     * @var MaintenanceService
     */
    private $service;

    /**
     * @var PeriodicityRepository
     */
    private $periodicityRepository;

    /**
     * @var ProviderRepository
     */
    private $providersRepository;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * MaintenanceController constructor.
     * @param MaintenanceRepository $repository
     * @param MaintenanceService $service
     * @param PeriodicityRepository $periodicityRepository
     * @param ProviderRepository $providersRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(MaintenanceRepository $repository,
                                MaintenanceService $service,
                                PeriodicityRepository $periodicityRepository,
                                ProviderRepository $providersRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->periodicityRepository = $periodicityRepository;
        $this->providersRepository = $providersRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = "Manutenções Preventivas";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'maintenance';

        $dados = $this->repository->getAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);
        $providers = $this->providersRepository->getAllCondominiumActive();

        return view('portal.manage.maintenance.index', compact('config', 'dados', 'providers'));
    }

    public function create()
    {
        $config['title'] = "Cadastrar Manutenção Preventiva";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'maintenance';
        $periodicitys = $this->periodicityRepository->getAll();

        return view('portal.manage.maintenance.create', compact('config', 'periodicitys'));
    }

    public function store(MaintenanceRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Manutenção Preventiva";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'maintenance';
        $dados = $this->repository->getMaintenance($id);
        $dados['start_date'] = date('d/m/Y', strtotime($dados['start_date']));
        $periodicitys = $this->periodicityRepository->getAll();

        return view('portal.manage.maintenance.edit', compact('dados', 'config', 'periodicitys'));
    }

    public function update(MaintenanceRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
