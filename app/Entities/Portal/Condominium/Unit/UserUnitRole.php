<?php

namespace CentralCondo\Entities\Portal\Condominium\Unit;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserUnitRole extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_unit_role';

    protected $fillable = [
        'name',
        'active'
    ];

    public function userUnit()
    {
        return $this->belongsTo(UserUnit::class);
    }

}
