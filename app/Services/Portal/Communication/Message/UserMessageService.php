<?php

namespace CentralCondo\Services\Portal\Communication\Message;

use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Validators\Portal\Communication\Message\UserMessageValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class UserMessageService
 * @package CentralCondo\Services\Portal\Communication\Message
 */
class UserMessageService
{

    /**
     * @var UserMessageRepository
     */
    protected $repository;

    /**
     * @var UserMessageValidator
     */
    protected $validator;

    /**
     * UserMessageService constructor.
     * @param UserMessageRepository $repository
     * @param UserMessageValidator $validator
     */
    public function __construct(UserMessageRepository $repository, UserMessageValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {
                $response = [
                    'message' => 'UsersRole add.',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('message', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
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

}