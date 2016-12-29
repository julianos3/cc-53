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

    public function update(User $user, UserCondominium $userCondominium)
    {
        //dd($userCondominium->user_id);
        $userRoleCondominiumId = session()->get('user_role_condominium');
        if ($userRoleCondominiumId == 1 ||
            $userRoleCondominiumId == 2 ||
            $userRoleCondominiumId == 3 ||
            $userRoleCondominiumId == 7 ||
            $userRoleCondominiumId == 9 ||
            $userCondominium->user_id == $user->id
        ) {
            return true;
        }
    }

    public function updateAdmin(User $user, UserCondominium $userCondominium)
    {
        //dd($userCondominium->user_id);
        $userRoleCondominiumId = session()->get('user_role_condominium');
        if ($userCondominium->user_role_condominium_id == 1 ||
            $userCondominium->user_role_condominium_id == 2 ||
            $userCondominium->user_role_condominium_id == 3 ||
            $userCondominium->user_role_condominium_id == 7 ||
            $userCondominium->user_role_condominium_id == 9
        ) {
            return true;
        }

    }
}
