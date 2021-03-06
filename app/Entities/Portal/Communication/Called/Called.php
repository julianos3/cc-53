<?php

namespace CentralCondo\Entities\Portal\Communication\Called;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Called extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'called';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'called_category_id',
        'called_status_id',
        'subject',
        'description',
        'visible'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class, 'user_condominium_id');
    }

    public function calledCategory()
    {
        return $this->belongsTo(CalledCategory::class);
    }

    public function calledHistoric()
    {
        return $this->hasMany(CalledHistoric::class);
    }

    public function calledStatus()
    {
        return $this->belongsTo(CalledStatus::class);
    }

}
