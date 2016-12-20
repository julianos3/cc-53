<?php

namespace CentralCondo\Entities\Portal\Condominium\Unit;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UnitType extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'unit_type';

    protected $fillable = [
        'name',
        'label',
        'active'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
