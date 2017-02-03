<?php

namespace CentralCondo\Entities\Portal\Condominium\Subscriptions;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Laravel\Cashier\Billable;

class Subscriptions extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'subscriptions';

    protected $fillable = [
        'condominium_id',
        'name',
        'stripe_id',
        'stripe_plan',
        'quantity',
        'trial_ends_at',
        'ends_at',
        'trial_ends_at'
    ];

    protected $dates = [
        'trial_ends_at'
    ];

}
