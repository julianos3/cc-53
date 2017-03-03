<?php

namespace CentralCondo\Listeners\Portal\Communication\Communication;

use CentralCondo\Events\Portal\Communication\Communication\SendMailCommunication;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailCommunicationFired implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */

    /**
     * @var UserCommunicationRepository
     */
    protected $userCommunicationRepository;

    /**
     * SendMailCommunicationFired constructor.
     * @param UserCommunicationRepository $userCommunicationRepository
     */
    public function __construct(UserCommunicationRepository $userCommunicationRepository)
    {
        $this->userCommunicationRepository = $userCommunicationRepository;
    }

    /**
     * @param SendMailCommunication $event
     */
    public function handle(SendMailCommunication $event)
    {
        $users = $this->userCommunicationRepository
            ->with(['userCondominium'])
            ->findWhere([
                'communication_id' => $event->communicationId
            ]);

        if ($event->action == 'create') {
            $title = 'Novo Comunicado';
            $routeEmail = 'portal.vendor.emails.communication.communication.new-communication';
        } else {
            $title = 'Alteração no Comunicado';
            $routeEmail = 'portal.vendor.emails.communication.communication.update-communication';
        }

        foreach ($users as $row) {
            if ($row->userCondominium->user->notification_email == 'y') {
                $name = $row->userCondominium->user->name;
                $nameCondominium = $row->userCondominium->condominium->name;

                Mail::queue($routeEmail,
                    [
                        'title' => $title,
                        'name' => $name,
                        'nameCondominium' => $nameCondominium,
                        'id' => $event->communicationId,
                        'route' => route('portal.communication.communication.view', ['id' => $event->communicationId])
                    ], function ($message) use ($row, $title) {
                        $message->from('suporte@centralcondo.com.br', 'Central Condo - Seu Condomínio nas nuvens');
                        $message->subject($title);
                        $message->priority(1);
                        $message->to($row->userCondominium->user->email, $row->userCondominium->user->name);
                    });
            }
        }
    }

}
