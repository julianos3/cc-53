<?php

namespace CentralCondo\Services\Portal\Communication\Message;

use CentralCondo\Repositories\Portal\Communication\Message\MessageRepository;
use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Validators\Portal\Communication\Message\MessageValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class MessageService
{

    /**
     * @var MessageRepository
     */
    protected $repository;

    /**
     * @var MessageValidator
     */
    protected $validator;

    protected $userMessageRepository;

    public function __construct(MessageRepository $repository,
                                MessageValidator $validator,
                                UserMessageRepository $userMessageRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userMessageRepository = $userMessageRepository;
    }

    public function create(array $data)
    {

        try {
            //dd($data);
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {

                if(is_array($data['users'])){
                    $this->addUsersMessage($dados['id'], $data['users']);
                }
                //cadastra grupo
                /*
                foreach($data['grupos'] as $row){
                    $usersMessage['user_condominium_id'] = $row;
                    $usersMessage['message_id'] = $data['id'];

                    $this->messageGroupRepository->create($usersMessage);
                }


                //cadsatra users_message
                foreach($data['users'] as $row){
                    $usersMessage['user_condominium_id'] = $row;
                    $usersMessage['message_id'] = $data['id'];

                    $this->userMessageRepository->create($usersMessage);
                }
                */
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

    public function addUsersMessage($messageId, $users)
    {
        if (is_array($users)) {
            foreach ($users as $row) {
                $usersMessage['user_condominium_id'] = $row;
                $usersMessage['message_id'] = $messageId;

                $this->userMessageRepository->create($usersMessage);
            }

            return true;
        }

        return false;
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = [
                    'message' => 'UsersRole updated.',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('message', $response['message']);
            }
        } catch (ValidatorException $e) {

            $response = response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

}