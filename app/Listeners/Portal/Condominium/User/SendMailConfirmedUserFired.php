<?php

namespace CentralCondo\Listeners\Portal\Condominium\User;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Events\Portal\Condominium\User\SendMailConfirmedUser;
use Illuminate\Support\Facades\Mail;

class SendMailConfirmedUserFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    /**
     * @var UserCondominium
     */
    protected $userCondominium;

    /**
     * SendMailConfirmedUserFired constructor.
     * @param UserCondominium $userCondominium
     */
    public function __construct(UserCondominium $userCondominium)
    {
        $this->userCondominium = $userCondominium;
    }

    /**
     * @param SendMailConfirmedUser $event
     */
    public function handle(SendMailConfirmedUser $event)
    {
        $user = $this->userCondominium->with(['user', 'condominium'])->find($event->user_condominium_id);
        if ($user->toArray()) {
            $title = 'Aprovação do seu novo condomínio';
            $name = $user->user->name;
            $nameCondominium = $user->condominium->name;

            Mail::queue('portal.vendor.emails.condominium.user.confirmed-condominium',
                [
                    'title' => $title,
                    'name' => $name,
                    'nameCondominium' => $nameCondominium
                ], function ($message) use ($user, $title) {
                    $message->from('suporte@centralcondo.com.br', 'Central Condo - Seu Condomínio nas nuvens');
                    $message->subject($title);
                    $message->priority(1);
                    $message->to($user->user->email, $user->user->name);
                });

        }
    }
}
