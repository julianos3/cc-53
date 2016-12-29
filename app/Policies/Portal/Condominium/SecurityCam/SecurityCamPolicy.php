<?php

namespace CentralCondo\Policies\Portal\Condominium\SecurityCam;

use CentralCondo\Entities\Portal\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SecurityCamPolicy
{
    use HandlesAuthorization;

    /**
     * SecurityCamPolicy constructor.
     */
    public function __construct()
    {
        //
    }

    public function admin(User $user)
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
