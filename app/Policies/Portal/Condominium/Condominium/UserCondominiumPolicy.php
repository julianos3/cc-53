<?php

namespace CentralCondo\Policies\Portal\Condominium\Condominium;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserCondominiumPolicy
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

    public function updateAdmin(User $user, UserCondominium $userCondominium)
    {
        if ($userCondominium->user_role_condominium_id == 1 ||
            $userCondominium->user_role_condominium_i == 2 ||
            $userCondominium->user_role_condominium_i == 3 ||
            $userCondominium->user_role_condominium_i == 7 ||
            $userCondominium->user_role_condominium_i == 9
        ) {
            return true;
        }
    }
}
