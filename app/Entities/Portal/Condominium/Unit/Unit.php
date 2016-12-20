<?php

namespace CentralCondo\Entities\Portal\Condominium\Unit;

use CentralCondo\Entities\Portal\Condominium\Block\Block;
use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Unit extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'unit';

    protected $fillable = [
        'name',
        'floor',
        'description',
        'unit_id',
        'condominium_id',
        'block_id',
        'unit_type_id'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function userUnit()
    {
        return $this->belongsTo(UserUnit::class);
    }

}
