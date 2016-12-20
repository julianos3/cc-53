<?php

namespace CentralCondo\Http\Controllers\Portal\Communication\Message;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\Communication\Message\MessageRequest;
use CentralCondo\Repositories\Portal\Communication\Message\MessageRepository;
use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Repositories\Portal\Condominium\Group\GroupCondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\Communication\Message\MessagePrivateService;
use CentralCondo\Services\Util\UtilObjeto;

/**
 * Class MessagePrivateController
 * @package CentralCondo\Http\Controllers\Portal\Communication\Message
 */
class MessagePrivateController extends Controller
{
    /**
     * @var MessageRepository
     */
    protected $repository;

    /**
     * @var MessagePrivateService
     */
    private $service;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * @var GroupCondominiumRepository
     */
    private $groupCondominiumRepository;

    /**
     * @var UserCondominiumRepository
     */
    private $userCondominiumRepository;

    /**
     * @var UserMessageRepository
     */
    private $userMessageRepository;

    /**
     * MessagePrivateController constructor.
     * @param MessageRepository $repository
     * @param MessagePrivateService $service
     * @param UtilObjeto $utilObjeto
     * @param GroupCondominiumRepository $groupCondominiumRepository
     * @param UserCondominiumRepository $userCondominiumRepository
     * @param UserMessageRepository $userMessageRepository
     */
    public function __construct(MessageRepository $repository,
                                MessagePrivateService $service,
                                UtilObjeto $utilObjeto,
                                GroupCondominiumRepository $groupCondominiumRepository,
                                UserCondominiumRepository $userCondominiumRepository,
                                UserMessageRepository $userMessageRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->utilObjeto = $utilObjeto;
        $this->groupCondominiumRepository = $groupCondominiumRepository;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->userMessageRepository = $userMessageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $config['title'] = 'Mensagens Privadas';

        $dados = $this->userMessageRepository->getAllUserPrivateCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.communication.message.private.index', compact('config', 'dados'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $config['title'] = 'Nova Mensagem Privada';

        $groupCondominium = $this->groupCondominiumRepository->getAllCondominium();
        $usersCondominium = $this->userCondominiumRepository->getAllCondominium();

        return view('portal.communication.message.private.create', compact('config', 'groupCondominium', 'usersCondominium'));
    }

    /**
     * @param MessageRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(MessageRequest $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
