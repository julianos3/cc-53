<?php

namespace CentralCondo\Entities\Portal\Communication\Called;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CalledHistoric extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'called_historic';

    protected $fillable = [
        'called_id',
        'user_condominium_id',
        'called_status_id',
        'description'
    ];

    public function called()
    {
        return $this->belongsTo(Called::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function calledStatus()
    {
        return $this->belongsTo(CalledStatus::class);
    }

}
