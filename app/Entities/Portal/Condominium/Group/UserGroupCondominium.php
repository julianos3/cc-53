<?php

namespace CentralCondo\Entities\Portal\Condominium\Group;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserGroupCondominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_group_condominium';

    protected $fillable = [
        'user_condominium_id',
        'group_id'
    ];

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function group()
    {
        return $this->belongsTo(GroupCondominium::class);
    }

}
