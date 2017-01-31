<?php

namespace CentralCondo\Http\Controllers\Portal\Manage\ReserveArea;

use CentralCondo\Services\Portal\Manage\ReserveArea\ReserveAreaService;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Manage\ReserveArea\ReserveAreaRequest;
use CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepository;
use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Services\Util\UtilObjeto;

class ReserveAreasController extends Controller
{
    /**
     * @var ReserveAreaRepository
     */
    protected $repository;

    /**
     * @var ReserveAreaService
     */
    private $service;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * ReserveAreasController constructor.
     * @param ReserveAreaRepository $repository
     * @param ReserveAreaService $service
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(ReserveAreaRepository $repository,
                                ReserveAreaService $service,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = "Recursos Comuns";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'reserve-areas';
        $dados = $this->repository->getAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.manage.reserve-areas.index', compact('config', 'dados'));
    }

    public function create()
    {
        $config['title'] = "Cadastrar Recurso Comum";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'reserve-areas';
        return view('portal.manage.reserve-areas.create', compact('config'));
    }

    public function store(ReserveAreaRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Recurso Comum";
        $config['activeMenu'] = 'manage';
        $config['activeMenuN2'] = 'reserve-areas';
        $dados = $this->repository->getReserveArea($id);

        return view('portal.manage.reserve-areas.edit', compact('dados', 'config'));
    }

    public function update(ReserveAreaRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
