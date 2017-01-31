<?php

namespace CentralCondo\Listeners\Portal\User;

use CentralCondo\Events\Portal\User\SendMailNewPassword;
use CentralCondo\User;
use Illuminate\Support\Facades\Mail;

class SendMailNewPasswordFired
{
    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param SendMailNewPassword $event
     */
    public function handle(SendMailNewPassword $event)
    {
        $title = 'Nova senha de acesso';
        $name = $event->dados->name;
        $password = $event->password;

        Mail::queue('portal.vendor.emails.user.new-password',
            [
                'title' => $title,
                'name' => $name,
                'password' => $password
            ], function ($message) use ($event) {
                $message->from('suporte@centralcondo.com.br', 'Nova senha de acesso | Central Condo - Seu Condomínio nas nuvens');
                $message->subject('Central Condo - Seu Condomínio nas nuvens');
                $message->priority(1);
                $message->to($event->dados->email, $event->dados->name);
            });


    }
}
