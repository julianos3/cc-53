<?php

namespace CentralCondo\Policies\Portal\Communication\Called;

use CentralCondo\Entities\Portal\Communication\Called\Called;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class CalledPolicy
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

    public function update(User $user, Called $called)
    {
        $userRoleCondominiumId = session()->get('user_role_condominium');
        if ($userRoleCondominiumId == 1 ||
            $userRoleCondominiumId == 2 ||
            $userRoleCondominiumId == 3 ||
            $userRoleCondominiumId == 7 ||
            $userRoleCondominiumId == 9 ||
            $called->user_condominium_id == session()->get('user_condominium_id') ||
            $called->called_status_id == 1 ||
            $called->called_status_id == 4
        ) {
            return true;
        }
    }
}
