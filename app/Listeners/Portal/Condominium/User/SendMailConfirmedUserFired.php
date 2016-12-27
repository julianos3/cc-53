<?php

namespace CentralCondo\Listeners\Portal\Condominium\User;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Events\Portal\Condominium\User\SendMailAddCondominium;
use CentralCondo\Events\Portal\Condominium\User\SendMailConfirmedUser;
use CentralCondo\Events\SomeEvent;
use Illuminate\Support\Facades\Mail;

class SendMailConfirmedUserFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $userCondominium;

    public function __construct(UserCondominium $userCondominium)
    {
        $this->userCondominium = $userCondominium;
    }

    /**
     * @param SendMailConfirmedUser $event
     */
    public function handle(SendMailConfirmedUser $event)
    {
        $users = $this->userCondominium->with(['user', 'condominium'])->find(['id' => $event->user_condominium_id]);
        if ($users->toArray()) {
            foreach ($users as $row) {
                $title = 'Aprovação do seu novo condomínio';
                $name = $row->user->name;
                $nameCondominium = $row->condominium->name;

                Mail::queue('portal.vendor.emails.condominium.user.confirmed-condominium',
                    [
                        'title' => $title,
                        'name' => $name,
                        'nameCondominium' => $nameCondominium
                    ], function ($message) use ($row) {
                        $message->from('suporte@centralcondo.com.br', 'Bem vindo | Central Condo - Seu Condomínio nas nuvens');
                        $message->subject('Central Condo - Seu Condomínio nas nuvens');
                        $message->priority(1);
                        $message->to($row->user->email, $row->user->name);
                    });
            }
        }
    }
}
