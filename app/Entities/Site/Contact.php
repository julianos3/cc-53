<?php

namespace CentralCondo\Entities\Site;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contact extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'name_condominium',
        'num_unit',
        'message'
    ];

}
