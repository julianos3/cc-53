<?php

namespace CentralCondo\Listeners\Portal\Condominium\User;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Events\Portal\Condominium\User\SendMailNotConfirmedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailNotConfirmedUserFired implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * @var UserCondominium
     */
    protected $userCondominium;

    /**
     * SendMailNotConfirmedUserFired constructor.
     * @param UserCondominium $userCondominium
     */
    public function __construct(UserCondominium $userCondominium)
    {
        $this->userCondominium = $userCondominium;
    }

    /**
     * @param SendMailNotConfirmedUser $event
     */
    public function handle(SendMailNotConfirmedUser $event)
    {
        $user = $this->userCondominium->with(['user', 'condominium'])->find($event->user_condominium_id);
        if ($user->toArray()) {
            $title = 'Você não foi aprovado em seu condomínio';
            $name = $user->user->name;
            $nameCondominium = $user->condominium->name;

            Mail::queue('portal.vendor.emails.condominium.user.not-confirmed-condominium',
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
