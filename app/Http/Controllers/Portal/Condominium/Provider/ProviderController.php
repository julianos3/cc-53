<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Provider;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Condominium\Provider\ProviderRequest;
use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepository;
use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepository;
use CentralCondo\Services\Portal\Condominium\Provider\ProviderService;
use CentralCondo\Services\Util\UtilObjeto;

class ProviderController extends Controller
{
    /**
     * @var ProviderRepository
     */
    protected $repository;

    /**
     * @var ProviderService
     */
    private $service;

    /**
     * @var ProviderCategoryRepository
     */
    private $providerCategoryRepository;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * ProviderController constructor.
     * @param ProviderRepository $repository
     * @param ProviderService $service
     * @param ProviderCategoryRepository $providerCategoryRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(ProviderRepository $repository,
                                ProviderService $service,
                                ProviderCategoryRepository $providerCategoryRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->providerCategoryRepository = $providerCategoryRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = "Fornecedores";
        $config['activeMenu'] = 'condominium';
        $config['activeMenuN2'] = 'provider';

        $dados = $this->repository->getAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.condominium.provider.index', compact('config', 'dados'));
    }

    public function create()
    {
        $config['title'] = "Novo Fornecedor";
        $config['activeMenu'] = 'condominium';
        $config['activeMenuN2'] = 'provider';
        $providerCategory = $this->providerCategoryRepository->getAllActive();

        return view('portal.condominium.provider.create', compact('config', 'providerCategory'));
    }

    public function createAjax()
    {
        $providerCategory = $this->providerCategoryRepository->getAllActive();

        return view('portal.condominium.provider.ajax.create', compact('providerCategory'));
    }

    public function listAllSelect()
    {
        $providers = $this->repository->getAllCondominium();

        return view('portal.condominium.provider.ajax.listAllSelect', compact('providers'));
    }

    public function storeAjax(ProviderRequest $request)
    {
        return $this->service->createAjax($request->all());
    }

    public function store(ProviderRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Fornecedor";
        $config['activeMenu'] = 'condominium';
        $config['activeMenuN2'] = 'provider';
        $dados = $this->repository->getProvider($id);
        $providerCategory = $this->providerCategoryRepository->getAllActive();

        return view('portal.condominium.provider.edit', compact('config', 'dados', 'providerCategory'));
    }

    public function update(ProviderRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
