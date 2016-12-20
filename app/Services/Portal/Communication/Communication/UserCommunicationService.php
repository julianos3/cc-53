<?php

namespace CentralCondo\Services\Portal\Communication\Communication;

use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Validators\Portal\Communication\Communication\UserCommunicationValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserCommunicationService
{

    /**
     * @var UserCommunicationRepository
     */
    protected $repository;

    /**
     * @var UserCommunicationValidator
     */
    protected $validator;

    /**
     * UserCommunicationService constructor.
     * @param UserCommunicationRepository $repository
     * @param UserCommunicationValidator $validator
     */
    public function __construct(UserCommunicationRepository $repository,
                                UserCommunicationValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = [
                    'message' => 'Comunicado ao usuário enviado com sucesso!',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('status', $response['message']);
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

                return redirect()->back()->with('message', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Usuário do Comunicado removido com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao remover Usuário do Comunicado!");
            return redirect()->back()->withErrors($response)->withInput();
        }
    }

}