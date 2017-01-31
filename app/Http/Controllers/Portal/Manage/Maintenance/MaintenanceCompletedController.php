<?php

namespace CentralCondo\Http\Controllers\Portal\Manage\Maintenance;

use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepository;
use CentralCondo\Services\Portal\Manage\Maintenance\MaintenanceCompletedService;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Manage\Maintenance\MaintenanceCompletedRequest;
use CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepository;
use CentralCondo\Http\Controllers\Controller;

class MaintenanceCompletedController extends Controller
{
    /**
     * @var MaintenanceCompletedRepository
     */
    protected $repository;

    /**
     * @var MaintenanceCompletedService
     */
    private $service;

    /**
     * @var
     */
    private $providersRepository;

    /**
     * MaintenanceCompletedController constructor.
     * @param MaintenanceCompletedRepository $repository
     * @param MaintenanceCompletedService $service
     * @param ProviderRepository $providersRepository
     */
    public function __construct(MaintenanceCompletedRepository $repository,
                                MaintenanceCompletedService $service,
                                ProviderRepository $providersRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->providersRepository = $providersRepository;
    }

    public function index($id)
    {
        $config['title'] = "Manutenções Realizadas";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'maintenance';
        $dados = $this->repository->getIdMaintenanceCompleted($id);

        return view('portal.manage.maintenance.completed.index', compact('config', 'dados'));
    }

    public function create($id)
    {
        $config['title'] = "Registrar Manutenção Preventiva";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'maintenance';

        $providers = $this->providersRepository->getAllCondominiumActive();

        return view('portal.manage.maintenance.completed.create', compact('dados', 'config', 'providers', 'id'));
    }

    public function store(MaintenanceCompletedRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Manutenção Preventiva";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'maintenance';
        $dados = $this->repository->getMaintenanceCompleted($id);
        $dados['date'] = date('d/m/Y', strtotime($dados['date']));
        
        $providers = $this->providersRepository->getAllCondominiumActive();

        return view('portal.manage.maintenance.completed.edit', compact('dados', 'config', 'providers'));
    }

    public function update(MaintenanceCompletedRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
