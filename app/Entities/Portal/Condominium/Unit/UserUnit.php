<?php

namespace CentralCondo\Entities\Portal\Condominium\Unit;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserUnit extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_unit';

    protected $fillable = [
        'user_condominium_id',
        'unit_id',
        'user_unit_role_id'
    ];

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function userUnitRole()
    {
        return $this->belongsTo(UserUnitRole::class);
    }

}
