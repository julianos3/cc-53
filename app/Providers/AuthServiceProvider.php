<?php

namespace CentralCondo\Providers;

use CentralCondo\Entities\Portal\Communication\Called\Called;
use CentralCondo\Entities\Portal\Communication\Message\Message;
use CentralCondo\Entities\Portal\Communication\Message\MessageReply;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\Condominium\Group\GroupCondominium;
use CentralCondo\Entities\Portal\Condominium\Group\UserGroupCondominium;
use CentralCondo\Entities\Portal\Condominium\SecurityCam\SecurityCam;
use CentralCondo\Http\Controllers\Portal\Home\HomeController;
use CentralCondo\Policies\Portal\Communication\Called\CalledPolicy;
use CentralCondo\Policies\Portal\Communication\Message\MessagePublicPolicy;
use CentralCondo\Policies\Portal\Communication\Message\MessageReplyPolicy;
use CentralCondo\Policies\Portal\Condominium\Group\GroupCondominiumPolicy;
use CentralCondo\Policies\Portal\Condominium\Condominium\UserCondominiumPolicy;
use CentralCondo\Policies\Portal\Condominium\SecurityCam\SecurityCamPolicy;
use CentralCondo\Policies\Portal\Condominium\Group\UserGroupCondominiumPolicy;
use CentralCondo\Policies\Portal\Home\HomePolicy;
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
        GroupCondominium::class => GroupCondominiumPolicy::class,
        UserGroupCondominium::class => UserGroupCondominiumPolicy::class,
        SecurityCam::class => SecurityCamPolicy::class,
        Message::class => MessagePublicPolicy::class,
        MessageReply::class => MessageReplyPolicy::class,
        Called::class => CalledPolicy::class,
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
