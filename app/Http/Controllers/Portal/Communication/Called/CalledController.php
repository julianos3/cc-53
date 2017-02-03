<?php

namespace CentralCondo\Http\Controllers\Portal\Communication\Called;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Communication\Called\CalledRequest;
use CentralCondo\Repositories\Portal\Communication\Called\CalledCategoryRepository;
use CentralCondo\Repositories\Portal\Communication\Called\CalledRepository;
use CentralCondo\Repositories\Portal\Communication\Called\CalledStatusRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\Communication\Called\CalledService;
use CentralCondo\Services\Util\UtilObjeto;

class CalledController extends Controller
{
    /**
     * @var CalledRepository
     */
    protected $repository;

    /**
     * @var CalledService
     */
    private $service;

    /**
     * @var CalledCategoryRepository
     */
    private $calledCategoryRepository;

    /**
     * @var CalledStatusRepository
     */
    private $calledStatusCategory;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * @var UserCondominiumRepository
     */
    private $userCodominiumRepository;

    /**
     * CalledController constructor.
     * @param CalledRepository $repository
     * @param CalledService $service
     * @param CalledCategoryRepository $calledCategoryRepository
     * @param CalledStatusRepository $calledStatusRepository
     * @param UtilObjeto $utilObjeto
     * @param UserCondominiumRepository $userCodominiumRepository
     */
    public function __construct(CalledRepository $repository,
                                CalledService $service,
                                CalledCategoryRepository $calledCategoryRepository,
                                CalledStatusRepository $calledStatusRepository,
                                UtilObjeto $utilObjeto, UserCondominiumRepository $userCodominiumRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->calledCategoryRepository = $calledCategoryRepository;
        $this->calledStatusCategory = $calledStatusRepository;
        $this->utilObjeto = $utilObjeto;
        $this->userCodominiumRepository = $userCodominiumRepository;
        $this->middleware('checkSubscriptions');
    }

    public function index()
    {
        $config['title'] = 'Chamados';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'called';

        $dados = $this->repository->getAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);
        $userCondominiumId = session()->get('user_condominium_id');

        return view('portal.communication.called.index', compact('config', 'dados', 'userCondominiumId'));
    }

    public function create()
    {
        $config['title'] = 'Cadastrar Chamado';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'called';
        $calledCategory = $this->calledCategoryRepository->getAll();
        $calledStatus = $this->calledStatusCategory->getAll();

        return view('portal.communication.called.create', compact('config', 'calledCategory', 'calledStatus', 'usersCondominium'));
    }

    public function store(CalledRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = 'Alterar Chamado';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'called';
        $dados = $this->repository->getId($id);
        $calledCategory = $this->calledCategoryRepository->getAll();
        $calledStatus = $this->calledStatusCategory->getAll();

        return view('portal.communication.called.edit', compact('dados', 'config', 'calledCategory', 'calledStatus'));
    }

    public function show($id)
    {
        $dados = $this->repository->getId($id);

        return view('portal.communication.called.show', compact('dados'));
    }

    public function view($id)
    {
        $config['title'] = 'Visualizar Chamado';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'called';
        $dados = $this->repository->getId($id);

        return view('portal.communication.called.view', compact('dados', 'config'));
    }

    public function update(CalledRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
