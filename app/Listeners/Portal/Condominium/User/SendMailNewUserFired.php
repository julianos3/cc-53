<?php

namespace CentralCondo\Listeners\Portal\Condominium\User;

use CentralCondo\Events\Portal\Condominium\User\SendMailNewUser;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use Illuminate\Support\Facades\Mail;

class SendMailNewUserFired
{
    /**
     * @var UserCondominiumRepository
     */
    protected $repository;

    /**
     * @var CondominiumRepository
     */
    protected $condominiumRepository;

    /**
     * SendMailNewUserFired constructor.
     * @param UserCondominiumRepository $repository
     * @param CondominiumRepository $condominiumRepository
     */
    public function __construct(UserCondominiumRepository $repository, CondominiumRepository $condominiumRepository)
    {
        $this->repository = $repository;
        $this->condominiumRepository = $condominiumRepository;
    }

    /**
     * @param SendMailNewUser $event
     */
    public function handle(SendMailNewUser $event)
    {
        $users = $this->repository->getUserAdmSendMail($event->condominium_id);
        $condominium = $this->condominiumRepository->find($event->condominium_id);
        if ($users->toArray()) {
            foreach ($users as $user) {

                if ($user->user->notification_email == 'y') {
                    $title = 'Solicitação de acesso ao condomínio ' . $condominium->name;
                    $name = $user->user->name;
                    $nameCondominium = $condominium->name;
                    $user_name = $event->user_name;

                    Mail::queue('portal.vendor.emails.condominium.user.new-user',
                        [
                            'title' => $title,
                            'name' => $name,
                            'user_name' => $user_name,
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
    }
}
