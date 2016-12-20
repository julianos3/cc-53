<?php

namespace CentralCondo\Services\Portal\Communication\Message;

use CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepository;
use CentralCondo\Repositories\Portal\Communication\Message\MessageRepository;
use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Validators\Portal\Communication\Message\MessageValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class MessagePublicService
{
    protected $repository;

    protected $validator;

    protected $usersMessageRepository;

    protected $messageReplyRepository;

    public function __construct(MessageRepository $repository,
                                MessageValidator $validator,
                                UserMessageRepository $usersMessageRepository,
                                MessageReplyRepository $messageReplyRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->usersMessageRepository = $usersMessageRepository;
        $this->messageReplyRepository = $messageReplyRepository;
    }

    public function create(array $data)
    {
        try {
            $data['public'] = 'y';
            $data['type'] = 's';
            $data['condominium_id'] = session()->get('condominium_id');
            $data['user_condominium_id'] = session()->get('user_condominium_id');
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);

            if ($dados) {
                $response = trans("Mensagem enviada com sucesso!");
                return redirect()->back()->with('status', trans($response));
            }

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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

                return redirect()->back()->with('status', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        //remover todas as mensagens
        $reply = $this->messageReplyRepository->findWhere(['message_id' => $id]);
        if ($reply->toArray()) {
            foreach ($reply as $row) {
                $this->messageReplyRepository->delete($row->id);
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