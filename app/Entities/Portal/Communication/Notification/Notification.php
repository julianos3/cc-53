<?php

namespace CentralCondo\Entities\Portal\Communication\Notification;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Notification extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'notification';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'name',
        'route',
        'view',
        'click'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

}
