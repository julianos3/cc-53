<?php

namespace CentralCondo\Entities\Portal\Communication\Communication;

use CentralCondo\Entities\Portal\Condominium\Group\GroupCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CommunicationGroup extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'communication_group';

    protected $fillable = [
        'communication_id',
        'group_condominium_id'
    ];

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function groupCondominium()
    {
        return $this->belongsTo(GroupCondominium::class);
    }

}
