<?php

namespace CentralCondo\Listeners\Portal\User;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Events\Portal\User\SendMailNewUserWellcome;
use CentralCondo\Events\SomeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailNewUserWellcomeFired implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param SendMailNewUserWellcome $event
     */
    public function handle(SendMailNewUserWellcome $event)
    {
        $users = $this->userCondominium->with(['user'])->find(['id' => $event->user_condominium_id]);
        if ($users->toArray()) {
            foreach ($users as $row) {
                $title = 'Bem Vindo';
                $name = $row->user->name;
                $password = $event->password;
                $email = $row->user->email;
                $nameCondominium = $row->condominium->name;

                Mail::queue('portal.vendor.emails.user.wellcome-new-user',
                    [
                        'title' => $title,
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
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
