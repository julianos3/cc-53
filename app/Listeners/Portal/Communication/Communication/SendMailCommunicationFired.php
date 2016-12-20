<?php

namespace CentralCondo\Listeners\Portal\Communication\Communication;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Events\Portal\Communication\Communication\SendMailCommunication;
use CentralCondo\Events\Portal\Condominium\User\SendMailAddCondominium;
use CentralCondo\Events\SomeEvent;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use Illuminate\Support\Facades\Mail;

class SendMailCommunicationFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $userCommunicationRepository;

    public function __construct(UserCommunicationRepository $userCommunicationRepository)
    {
        $this->userCommunicationRepository = $userCommunicationRepository;
    }

    /**
     * @param SendMailCommunication $event
     */
    public function handle(SendMailCommunication $event)
    {
        $users = $this->userCommunicationRepository->with(['userCondominium'])->findWhere(['communication_id' => $event->communicationId]);

        $title = 'Comunicado';
        $content = 'Novo Comunicado';
        $message = 'Aqui vai o conteúdo do comunicado.';

        foreach ($users as $row) {
            $name = $row->userCondominium->user->name;
            $nameCondominium = $row->userCondominium->condominium->name;

            Mail::queue('portal.vendor.emails.communication.communication.new-communication',
                [
                    'title' => $title,
                    'name' => $name,
                    'nameCondominium' => $nameCondominium
                ], function ($message) use ($row) {
                    $message->from('suporte@centralcondo.com.br', 'Novo Comunicado');
                    $message->subject('Central Condo - Seu Condomínio nas nuvens');
                    $message->priority(1);
                    $message->to($row->userCondominium->user->email, $row->userCondominium->user->name);
                });

        }

    }
}
