<?php

namespace CentralCondo\Listeners\Portal\User;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Events\Portal\User\SendMailWellcome;
use CentralCondo\Events\SomeEvent;
use CentralCondo\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWellcomeFired
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
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SendMailWellcome $event)
    {
        $users = $this->userCondominium->with(['user', 'condominium'])->find(['id' => $event->user_condominium_id]);
        if ($users->toArray()) {
            foreach ($users as $row) {
                $title = 'Bem Vindo ao seu novo condomínio';
                $name = $row->user->name;
                $nameCondominium = $row->condominium->name;

                Mail::queue('vendor.emails.portal.user.wellcome',
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
