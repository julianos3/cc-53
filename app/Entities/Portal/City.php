<?php

namespace CentralCondo\Entities\Portal;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class City extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'city';

    protected $fillable = [
        'state_id',
        'name',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

}
