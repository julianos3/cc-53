<?php

namespace CentralCondo\Http\Controllers\Portal\Communication\Communication;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Communication\Communication\CommunicationRequest;
use CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepository;
use CentralCondo\Repositories\Portal\Communication\Communication\CommunicationRepository;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepository;
use CentralCondo\Services\Portal\Communication\Communication\CommunicationService;
use CentralCondo\Services\Portal\Communication\Communication\UserCommunicationService;
use CentralCondo\Services\Util\UtilObjeto;

class CommunicationCondominiumController extends Controller
{
    /**
     * @var CommunicationRepository
     */
    protected $repository;

    /**
     * @var CommunicationService
     */
    private $service;

    /**
     * @var GroupCondominiumRepository
     */
    private $groupCondominiumRepository;

    /**
     * @var CommunicationGroupRepository
     */
    private $communicationGroupRepository;

    /**
     * @var UserCommunicationRepository
     */
    private $userCommunicationRepository;

    /**
     * @var UserCondominiumRepository
     */
    private $userCondominiumRepository;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * CommunicationController constructor.
     * @param CommunicationRepository $repository
     * @param CommunicationService $service
     * @param GroupCondominiumRepository $groupCondominiumRepository
     * @param CommunicationGroupRepository $communicationGroupRepository
     * @param UserCommunicationRepository $userCommunicationRepository
     * @param UserCondominiumRepository $userCondominiumRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(CommunicationRepository $repository,
                                CommunicationService $service,
                                GroupCondominiumRepository $groupCondominiumRepository,
                                CommunicationGroupRepository $communicationGroupRepository,
                                UserCommunicationRepository $userCommunicationRepository,
                                UserCondominiumRepository $userCondominiumRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->groupCondominiumRepository = $groupCondominiumRepository;
        $this->communicationGroupRepository = $communicationGroupRepository;
        $this->userCommunicationRepository = $userCommunicationRepository;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = 'Comunicados';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'communication-condominium';

        $dados = $this->repository->getAllCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.communication.communication-condominium.index', compact('config', 'dados', 'user_condominium_id'));
    }

    public function create()
    {
        $config['title'] = 'Novo Comunicado';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'communication-condominium';
        $groupCondominium = $this->groupCondominiumRepository->getAllCondominium();

        return view('portal.communication.communication-condominium.create', compact('config', 'groupCondominium'));
    }

    public function store(CommunicationRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $config['title'] = 'Alterar Comunicado';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'communication-condominium';

        $dados = $this->repository->getId($id);
        $dados['date_display'] = date('d/m/Y', strtotime($dados['date_display']));
        $groupCommunication = $this->communicationGroupRepository
            ->with(['groupCondominium'])
            ->findWhere(['communication_id' => $dados['id']]);

        return view('portal.communication.communication-condominium.edit', compact('config', 'dados', 'groupCommunication'));
    }

    public function update(CommunicationRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function show($id)
    {
        $config['title'] = 'Visualizar Comunicado';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'communication-condominium';
        $dados = $this->repository->getId($id);

        return view('portal.communication.communication-condominium.show', compact('config', 'dados'));
    }
}
