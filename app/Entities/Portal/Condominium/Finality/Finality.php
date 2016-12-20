<?php

namespace CentralCondo\Entities\Portal\Condominium\Finality;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Finality extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'finality';

    protected $fillable = [
        'name',
        'active'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

}
