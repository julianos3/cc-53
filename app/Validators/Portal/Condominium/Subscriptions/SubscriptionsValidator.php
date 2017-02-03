<?php

namespace CentralCondo\Validators\Portal\Condominium\Subscriptions;

use Prettus\Validator\LaravelValidator;

class SubscriptionsValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        //'name' => 'required|min:3',
        //'stripe_id' => 'required',
        //'quantity' => 'required'
    ];
}
