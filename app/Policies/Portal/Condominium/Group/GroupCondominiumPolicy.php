<?php

namespace CentralCondo\Policies\Portal\Condominium\Group;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupCondominiumPolicy
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

    public function admin()
    {
        $userRoleCondominiumId = session()->get('user_role_condominium');
        if ($userRoleCondominiumId == 1 ||
            $userRoleCondominiumId == 2 ||
            $userRoleCondominiumId == 3 ||
            $userRoleCondominiumId == 7 ||
            $userRoleCondominiumId == 9
        ) {
            return true;
        }
    }

}
