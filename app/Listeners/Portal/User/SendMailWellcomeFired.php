<?php

namespace CentralCondo\Listeners\Portal\User;

use CentralCondo\Events\Portal\User\SendMailWellcome;
use CentralCondo\Events\SomeEvent;
use CentralCondo\Repositories\Portal\User\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWellcomeFired implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent $event
     * @return void
     */
    public function handle(SendMailWellcome $event)
    {
        $user = $this->userRepository->find($event->user_id);
        if ($user->toArray()) {
            $title = 'Bem Vindo ao seu novo condomínio';
            $name = $user->name;

            Mail::queue('portal.vendor.emails.user.wellcome',
                [
                    'title' => $title,
                    'name' => $name
                ], function ($message) use ($user) {
                    $message->from('suporte@centralcondo.com.br', 'Bem vindo | Central Condo - Seu Condomínio nas nuvens');
                    $message->subject('Central Condo - Seu Condomínio nas nuvens');
                    $message->priority(1);
                    $message->to($user->email, $user->name);
                });
        }
    }
}
