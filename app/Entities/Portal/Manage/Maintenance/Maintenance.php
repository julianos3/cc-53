<?php

namespace CentralCondo\Entities\Portal\Manage\Maintenance;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\Manage\Periodicity\Periodicity;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Maintenance extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'maintenance';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'periodicity_id',
        'name',
        'start_date',
        'description'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function periodicity()
    {
        return $this->belongsTo(Periodicity::class);
    }

    public function maintenanceCompleted()
    {
        return $this->hasMany(MaintenanceCompleted::class);
    }

}
