<?php

namespace CentralCondo\Services\Portal\Communication\Message;

use CentralCondo\Entities\Portal\Condominium\Group\UserGroupCondominium;
use CentralCondo\Repositories\Portal\Communication\Message\MessageGroupRepository;
use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepository;
use CentralCondo\Validators\Portal\Communication\Message\MessageGroupValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class MessageGroupService
{

    protected $repository;

    protected $validator;

    protected $userGroupCondominumRepository;

    protected $userMessageRepository;

    protected $userMessageService;

    protected $messageService;

    public function __construct(MessageGroupRepository $repository,
                                MessageGroupValidator $validator,
                                UserGroupCondominiumRepository $userGroupCondominumRepository,
                                UserMessageRepository $userMessageRepository,
                                UserMessageService $userMessageService,
                                MessageService $messageService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userGroupCondominumRepository = $userGroupCondominumRepository;
        $this->userMessageRepository = $userMessageRepository;
        $this->userMessageService = $userMessageService;
        $this->messageService = $messageService;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if($dados) {

                //cadastra users condominium pelo group
                $this->registerUsersMessage($dados);

                $response = [
                    'message' => 'UsersRole add.',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('message', $response['message']);
            }
        } catch (ValidatorException $e) {
            $response = [
                'error' => true,
                'message' => $e->getMessageBag()
            ];


            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function registerUsersMessage($data)
    {
        if ($data->toArray()) {
            //buscar os usuarios do condominium que pertencem aos grupos cadastrados da mensagem
            $groups = $this->userGroupCondominumRepository->getAllGroupCondominium($data['group_condominium_id']);
            if($groups->toArray()) {
                foreach ($groups as $row) {
                    $message['message_id'] = $data['message_id'];
                    $message['user_condominium_id'] = $row->user_condominium_id;

                    $this->userMessageService->create($message);
                    //cadastra notificação aos usuarios
                    //$this->registerNotification($communicationId, $row->user_condominium_id);

                }
            }

            return true;
        }

        return false;
    }

}