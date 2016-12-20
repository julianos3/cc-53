<?php

namespace CentralCondo\Entities\Portal\Communication\Communication;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserCommunication extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_communication';

    protected $fillable = [
        'user_condominium_id',
        'communication_id',
        'view',
        'date_view'
    ];

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

}
