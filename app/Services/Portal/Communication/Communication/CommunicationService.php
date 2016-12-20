<?php

namespace CentralCondo\Services\Portal\Communication\Communication;

use CentralCondo\Events\Portal\Communication\Communication\SendMailCommunication;
use CentralCondo\Events\Portal\Communication\SendMail;
use CentralCondo\Listeners\Portal\Communication\Communication\SendMailCommunicationired;
use CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepository;
use CentralCondo\Repositories\Portal\Communication\Communication\CommunicationRepository;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Services\Portal\Communication\Notification\NotificationService;
use CentralCondo\Validators\Portal\Communication\Communication\CommunicationValidator;
use Illuminate\Support\Facades\Event;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class CommunicationService
{

    protected $repository;

    protected $validator;

    protected $communicationGroupRepository;

    protected $communicationGroupService;

    protected $userCondominiumRepository;

    protected $userCommunicationService;

    protected $userCommunicationRepository;

    protected $notificationService;

    public function __construct(CommunicationRepository $repository,
                                CommunicationValidator $validator,
                                CommunicationGroupRepository $communicationGroupRepository,
                                CommunicationGroupService $communicationGroupService,
                                UserCondominiumRepository $userCondominiumRepository,
                                UserCommunicationService $userCommunicationService,
                                UserCommunicationRepository $userCommunicationRepository,
                                NotificationService $notificationService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->communicationGroupRepository = $communicationGroupRepository;
        $this->communicationGroupService = $communicationGroupService;
        $this->userCondominiumRepository = $userCondominiumRepository;
        $this->userCommunicationService = $userCommunicationService;
        $this->userCommunicationRepository = $userCommunicationRepository;
        $this->notificationService = $notificationService;
    }

    public function create(array $data)
    {
        if (!isset($data['send_mail'])) {
            $data['send_mail'] = 'n';
        }

        try {
            $data['condominium_id'] = session()->get('condominium_id');
            $data['user_condominium_id'] = session()->get('user_condominium_id');
            $data['date_display'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date_display'])));
            if ($data['destination'] == 'all_user') {
                $data['all_user'] = 'y';
            } else {
                $data['all_user'] = 'n';
            }

            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {

                //cadastra usuarios do comunicado
                if ($dados['all_user'] == 'y') {
                    $this->registerUser($dados['id']);
                } else {
                    //cadastra communication group
                    if ($data['destination'] == 'group') {
                        if (count($data['groups']) > 0) {
                            foreach ($data['groups'] as $row) {

                                $commnucationGroup['communication_id'] = $dados['id'];
                                $commnucationGroup['group_condominium_id'] = $row;
                                $this->communicationGroupRepository->create($commnucationGroup);

                            }
                        }
                    }

                    //cadastra usuario do comunicado referente aos seus grupos
                    $this->registerUserGroups($dados['id']);
                }

                //envia email para os usuarios
                if ($dados['send_mail'] == 'y') {
                    $this->sendMail($dados['id']);
                }

                $response = [
                    'message' => 'Comunicado enviado com sucesso!',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('status', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function registerUser($communicationId)
    {
        if ($communicationId) {

            $users = $this->userCondominiumRepository->getAllCondominiumActive();
            if ($users->toArray()) {
                foreach ($users as $row) {
                    $usersCommunication['communication_id'] = $communicationId;
                    $usersCommunication['user_condominium_id'] = $row->id;
                    $usersCommunication['view'] = 'n';
                    //$usersCommunication['date_view'] = '0000-00-00';

                    $this->userCommunicationService->create($usersCommunication);

                    //cadastra notificação aos usuarios
                    $this->registerNotification($communicationId, $row->id);
                }
            }

            return true;
        }

        return false;
    }

    public function registerNotification($communicationId, $userCondominiumId, $name = "")
    {
        if (isset($communicationId) && isset($userCondominiumId)) {
            $communication['condominium_id'] = session()->get('condominium_id');
            $communication['user_condominium_id'] = $userCondominiumId;
            $communication['name'] = 'Novo comunicado #' . $communicationId;
            $communication['view'] = 'n';
            if (!isset($name)) {
                $communication['name'] = $name;
            }
            $communication['route'] = route('portal.communication.communication.show', ['id' => $communicationId]);

            $this->notificationService->create($communication);

            return true;
        }
        return false;
    }

    public function registerUserGroups($communicationId)
    {
        if ($communicationId) {
            //buscar os usuarios do condominium que pertencem aos grupos cadastrados do comunicado
            $groups = $this->communicationGroupRepository->findWhere(['communication_id' => $communicationId]);
            if ($groups[0]->toArray()) {
                foreach ($groups[0]->groupCondominium->userGroupCondominium as $row) {

                    //verifica se já foi adicionado em user_communication
                    $verifica = $this->userCommunicationRepository->findWhere([
                        'communication_id' => $communicationId,
                        'user_condominium_id' => session()->get('user_condominium_id')
                    ]);

                    if (!$verifica->toArray()) {

                        $usersCommunication['user_condominium_id'] = $row->user_condominium_id;
                        $usersCommunication['communication_id'] = $communicationId;
                        $usersCommunication['view'] = 'n';

                        $this->userCommunicationService->create($usersCommunication);

                        //cadastra notificação aos usuarios
                        $this->registerNotification($communicationId, $row->user_condominium_id);
                    }

                }
            }

            return true;
        }

        return false;
    }

    public function sendMail($communicationId)
    {
        if ($communicationId) {
            Event::fire(new SendMailCommunication($communicationId));

            return true;
        }
        return false;
    }

    public function update(array $data, $id)
    {
        try {
            $communication = $this->repository->find($id);

            $data['send_mail'] = $communication->send_mail;
            $data['all_user'] = $communication->send_mail;
            $data['condominium_id'] = session()->get('condominium_id');
            $data['user_condominium_id'] = session()->get('user_condominium_id');
            $data['date_display'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['date_display'])));

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if ($dados) {

                $this->updateCommunication($dados['id']);

                $response = [
                    'message' => 'Comunicado alterado com sucesso!',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('status', $response['message']);
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function updateCommunication($communicationId)
    {
        if ($communicationId) {
            $usersCommunication = $this->userCommunicationRepository->findWhere(['communication_id' => $communicationId]);
            if ($usersCommunication->toArray()) {
                foreach ($usersCommunication as $row) {
                    $name = "Alteração no Comunicado #" . $communicationId;
                    $this->registerNotification($communicationId, $row->user_condominium_id, $name);
                }
            }

            return true;
        }
        return false;
    }

    public function destroy($id)
    {
        $usersCommunication = $this->userCommunicationRepository->findWhere(['communication_id' => $id]);
        if ($usersCommunication->toArray()) {
            foreach ($usersCommunication as $row) {
                $this->userCommunicationService->destroy($row->id);
            }
        }

        $groupCommunication = $this->communicationGroupRepository->findWhere(['communication_id' => $id]);
        if ($groupCommunication->toArray()) {
            foreach ($groupCommunication as $row) {
                $this->communicationGroupService->destroy($row->id);
            }
        }

        $deleted = $this->repository->delete($id);
        if ($deleted) {
            $response = trans("Comunicado removido com sucesso!");
            return redirect()->back()->with('status', trans($response));
        } else {
            $response = trans("Erro ao remover comunicado!");
            return redirect()->back()->withErrors($response)->withInput();
        }

    }

}