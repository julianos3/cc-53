<?php

namespace CentralCondo\Providers;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Policies\Portal\Condominium\Condominium\UserCondominiumPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'CentralCondo\Model' => 'CentralCondo\Policies\ModelPolicy',
        UserCondominium::class => UserCondominiumPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
        Gate::define('updateAdmin', function ($userCondominiumId) {
            if ($userCondominiumId == 1 ||
                $userCondominiumId == 2 ||
                $userCondominiumId == 3 ||
                $userCondominiumId == 7 ||
                $userCondominiumId == 9
            ) {
                return true;
            }else {
                return false;
            }

           // return $user->id == $post->user_id;
        });
        */

        //
    }
}
