<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\SecurityCam;

use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Services\Portal\Condominium\SecurityCam\SecurityCamService;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Condominium\SecurityCam\SecurityCamRequest;
use CentralCondo\Repositories\Portal\Condominium\SecurityCam\SecurityCamRepository;
use CentralCondo\Services\Util\UtilObjeto;
use CentralCondo\Http\Controllers\Controller;

class SecurityCamController extends Controller
{
    /**
     * @var SecurityCamRepository
     */
    protected $repository;

    /**
     * @var SecurityCamService
     */
    private $service;

    /**
     * @var CondominiumRepository
     */
    private $condominiumRepository;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * SecurityCamController constructor.
     * @param SecurityCamRepository $repository
     * @param SecurityCamService $service
     * @param CondominiumRepository $condominiumRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(SecurityCamRepository $repository,
                                SecurityCamService $service,
                                CondominiumRepository $condominiumRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->condominiumRepository = $condominiumRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = "Câmeras de Segurança";
        $dados = $this->repository->getAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.condominium.security-cam.index', compact('config', 'dados'));
    }

    public function show($id)
    {
        $dados = $this->repository->getId($id);

        return view('portal.condominium.security-cam.show', compact('dados'));
    }

    public function listAll()
    {
        $config['title'] = "Todas as câmeras";
        $dados = $this->repository->getAllCondominium();

        return view('portal.condominium.security-cam.list', compact('config', 'dados'));
    }

    public function create()
    {
        $config['title'] = "Nova Câmera de Segurança";
        return view('portal.condominium.security-cam.create', compact('config'));
    }

    public function store(SecurityCamRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Câmera de Segurança";
        $dados = $this->repository->getId($id);

        return view('portal.condominium.security-cam.edit', compact('config', 'dados'));
    }

    public function update(SecurityCamRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
