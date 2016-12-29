<?php

namespace CentralCondo\Policies\Portal\Communication\Message;

use CentralCondo\Entities\Portal\Communication\Message\Message;
use CentralCondo\Entities\Portal\Communication\Message\MessageReply;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class MessageReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, MessageReply $userCondominium)
    {
        $userRoleCondominiumId = session()->get('user_role_condominium');
        if ($userRoleCondominiumId == 1 ||
            $userRoleCondominiumId == 2 ||
            $userRoleCondominiumId == 3 ||
            $userRoleCondominiumId == 7 ||
            $userRoleCondominiumId == 9 ||
            $userCondominium->user_condominium_id == session()->get('user_condominium_id')
        ) {
            return true;
        }
    }
}
