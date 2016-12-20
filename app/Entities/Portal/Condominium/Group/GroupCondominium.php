<?php

namespace CentralCondo\Entities\Portal\Condominium\Group;

use CentralCondo\Entities\Portal\Communication\Communication\CommunicationGroup;
use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class GroupCondominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'group_condominium';

    protected $fillable = [
        'condominium_id',
        'name',
        'active'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userGroupCondominium()
    {
        return $this->hasMany(UserGroupCondominium::class, 'group_id');
    }

    public function communicationGroup()
    {
        return $this->belongsTo(CommunicationGroup::class);
    }

}
