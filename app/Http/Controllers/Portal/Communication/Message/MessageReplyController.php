<?php

namespace CentralCondo\Http\Controllers\Portal\Communication\Message;

use CentralCondo\Http\Controllers\Controller;
use CentralCondo\Http\Requests\Portal\Communication\Message\MessageReplyRequest;
use CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepository;
use CentralCondo\Services\Portal\Communication\Message\MessageReplyService;

class MessageReplyController extends Controller
{
    /**
     * @var MessageReplyRepository
     */
    protected $repository;

    /**
     * @var MessageReplyService
     */
    private $service;

    /**
     * MessageReplyController constructor.
     * @param MessageReplyRepository $repository
     * @param MessageReplyService $service
     */
    public function __construct(MessageReplyRepository $repository,
                                MessageReplyService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($messageId)
    {
        $dados = $this->repository->findWhere([
            'message_id' => $messageId
        ]);
        return view('portal.message.reply.index', compact('dados', 'messageId'));
    }

    public function store(MessageReplyRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
