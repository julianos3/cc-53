<?php

namespace CentralCondo\Entities\Site;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Newsletter extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'email'
    ];

}
