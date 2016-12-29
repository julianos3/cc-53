<?php

namespace CentralCondo\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'CentralCondo\Events\SomeEvent' => [
            'CentralCondo\Listeners\EventListener',
        ],
        'CentralCondo\Events\Portal\User\SendMailWellcome' => [
            'CentralCondo\Listeners\Portal\User\SendMailWellcomeFired'
        ],
        'CentralCondo\Events\Portal\User\SendMailNewUserWellcome' => [
            'CentralCondo\Listeners\Portal\User\SendMailNewUserWellcomeFired'
        ],
        'CentralCondo\Events\Portal\Condominium\User\SendMailAddCondominium' => [
            'CentralCondo\Listeners\Portal\Condominium\User\SendMailAddCondominiumFired'
        ],
        'CentralCondo\Events\Portal\Condominium\User\SendMailConfirmedUser' => [
            'CentralCondo\Listeners\Portal\Condominium\User\SendMailConfirmedUserFired'
        ],
        'CentralCondo\Events\Portal\Condominium\User\SendMailNotConfirmedUser' => [
            'CentralCondo\Listeners\Portal\Condominium\User\SendMailNotConfirmedUserFired'
        ],
        'CentralCondo\Events\Portal\Communication\Communication\SendMailCommunication' => [
            'CentralCondo\Listeners\Portal\Communication\Communication\SendMailCommunicationFired'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
