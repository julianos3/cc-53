<?php

namespace CentralCondo\Entities\Portal\Condominium\Condominium;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserRoleCondominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_role_condominium';

    protected $fillable = [
        'name',
        'active',
        'admin'
    ];

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

}
