<?php

namespace CentralCondo\Http\Controllers\Portal\Condominium\Provider;

use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepository;
use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderRepository;
use CentralCondo\Services\Portal\Condominium\Provider\ProviderService;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Condominium\Provider\ProviderRequest;
use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Services\Util\UtilObjeto;

class ProviderController extends Controller
{
    /**
     * @var ProvidersRepository
     */
    protected $repository;

    /**
     * @var ProvidersService
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
     * @param ProvidersRepository $repository
     * @param ProvidersService $service
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
        $this->condominium_id = session()->get('condominium_id');
    }

    public function index()
    {
        $config['title'] = "Fornecedores";
        $dados = $this->repository->getAllCondominium();

        $dados = $this->utilObjeto->paginate($dados);
        return view('portal.condominium.provider.index', compact('config','dados'));
    }

    public function create()
    {
        $config['title'] = "Novo Fornecedor";
        $providerCategory = $this->providerCategoryRepository->getAllActive();

        return view('portal.condominium.provider.create', compact('config', 'providerCategory'));
    }

    public function store(ProviderRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = "Alterar Fornecedor";
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
