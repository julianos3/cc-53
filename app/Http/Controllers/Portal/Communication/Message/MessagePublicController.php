<?php

namespace CentralCondo\Http\Controllers\Portal\Communication\Message;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Communication\Message\MessageRequest;
use CentralCondo\Repositories\Portal\Communication\Message\MessageRepository;
use CentralCondo\Services\Portal\Communication\Message\MessagePublicService;
use CentralCondo\Services\Util\UtilObjeto;

class MessagePublicController extends Controller
{
    /**
     * @var MessageRepository
     */
    protected $repository;

    /**
     * @var MessagePublicService
     */
    private $service;

    /**
     * @var UtilObjeto
     */
    private $utilObjeto;

    /**
     * MessagePublicController constructor.
     * @param MessageRepository $repository
     * @param MessagePublicService $service
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(MessageRepository $repository,
                                MessagePublicService $service,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config['title'] = 'Mensagens Públicas';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'message';

        $dados = $this->repository->getAllPublicCondominium();
        $dados = $this->utilObjeto->paginate($dados);

        return view('portal.communication.message.public.index', compact('config', 'dados'));
    }

    public function create()
    {
        $config['title'] = 'Nova Mensagem Pública';
        $config['activeMenu'] = 'communication';
        $config['activeMenuN2'] = 'message';
        return view('portal.communication.message.public.create', compact('config'));
    }

    public function store(MessageRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
