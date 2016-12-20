<?php

namespace CentralCondo\Services\Portal\Communication\Message;

use CentralCondo\Repositories\Portal\Communication\Message\MessageGroupRepository;
use CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepository;
use CentralCondo\Repositories\Portal\Communication\Message\MessageRepository;
use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Validators\Portal\Communication\Message\MessageValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class MessagePrivateService
 * @package CentralCondo\Services\Portal\Communication\Message
 */
class MessagePrivateService
{
    /**
     * @var MessageRepository
     */
    protected $repository;

    /**
     * @var MessageValidator
     */
    protected $validator;

    /**
     * @var UserMessageRepository
     */
    protected $userMessageRepository;

    /**
     * @var MessageReplyRepository
     */
    protected $messageReplyRepository;

    /**
     * @var UserCondominiumRepository
     */
    protected $userCondominiumRepository;

    /**
     * @var UserMessageService
     */
    protected $userMessageService;

    /**
     * @var MessageGroupService
     */
    protected $messageGroupService;

    /**
     * @var MessageGroupRepository
     */
    protected $messageGroupRepository;

    /**
     * MessagePrivateService constructor.
     * @param MessageRepository $repository
     * @param MessageValidator $validator
     * @param UserMessageRepository $userMessageRepository
     * @param MessageReplyRepository $messageReplyRepository
     * @param UserCondominiumRepository $userCondominiumRepository
     * @param UserMessageService $userMessageService
     * @param MessageGroupService $messageGroupService
     * @param MessageGroupRepository $messageGroupRepository
     */
    public function __construct(MessageRepository $repository,
                                MessageValidator $validator,
                                UserMessageRepository $userMessageRepository,
                                MessageReplyRepository $messageReplyRepository,
                                UserCondominiumRepository $userCondominiumRepository,
                                UserMessageService $userMessageService,
                                MessageGroupService $messageGroupService,
                                MessageGroupRepository $messageGroupRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userMessageRepository = $userMessageRepository;
        $this->messageReplyRepository = $messageReplyRepository;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->userMessageService = $userMessageService;
        $this->messageGroupService = $messageGroupService;
        $this->messageGroupRepository = $messageGroupRepository;
        $this->condominium_id = session()->get('condominium_id');
        $this->user_condominium_id = session()->get('user_condominium_id');
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(array $data)
    {
        try {
            $data['public'] = 'n';
            $data['type'] = 's';
            $data['condominium_id'] = session()->get('condominium_id');
            $data['user_condominium_id'] = session()->get('user_condominium_id');;

            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);

            if ($dados) {

                //register users message
                if ($data['destination'] == 'all_user') {
                    $this->registerAllUsers($dados);
                } elseif ($data['destination'] == 'users') {
                    $this->usersMessage($dados['id'], $data['users']);
                } elseif ($data['destination'] == 'group') {
                    $this->messageGroup($dados['id'], $data['groups']);
                }

                $response = trans("Mensagem enviada com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function registerAllUsers($data)
    {
        if ($data->toArray()) {

            $users = $this->userCondominiumRepository->getAllCondominiumActive();
            if ($users->toArray()) {

                foreach ($users as $row) {
                    $message['message_id'] = $data['id'];
                    $message['user_condominium_id'] = $row->id;

                    $this->userMessageService->create($message);

                    //cadastra notificação aos usuarios
                    //$this->registerNotification($communicationId, $row->user_condominium_id);
                }

            }

            return true;
        }

        return false;
    }

    /**
     * @param $messageId
     * @param $users
     * @return bool
     */
    public function usersMessage($messageId, $users)
    {
        if ($users) {
            foreach ($users as $row) {
                $usersMessage['message_id'] = $messageId;
                $usersMessage['user_condominium_id'] = $row;

                $this->userMessageService->create($usersMessage);
            }
            return true;
        }

        return false;
    }

    /**
     * @param $messageId
     * @param $group
     * @return bool
     */
    public function messageGroup($messageId, $group)
    {
        if ($group) {
            foreach ($group as $key) {
                $messageGroup['message_id'] = $messageId;
                $messageGroup['group_condominium_id'] = $key;
                $this->messageGroupService->create($messageGroup);
            }
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //remover todas as mensagens
        $reply = $this->messageReplyRepository->findWhere(['message_id' => $id]);
        if ($reply->toArray()) {
            foreach ($reply as $row) {
                $this->messageReplyRepository->delete($row->id);
            }
        }

        $usersMessage = $this->userMessageRepository->findWhere(['message_id' => $id]);
        if ($usersMessage->toArray()) {
            foreach ($usersMessage as $row) {
                $this->userMessageRepository->delete($row->id);
            }
        }

        $messageGroup = $this->messageGroupRepository->findWhere(['message_id' => $id]);
        if ($messageGroup->toArray()) {
            foreach ($messageGroup as $row) {
                $this->messageGroupRepository->delete($row->id);
            }
        }

        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Mensagem removida com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao remover Mensagem!");
            return redirect()->back()->withErrors($response)->withInput();
        }

    }


}