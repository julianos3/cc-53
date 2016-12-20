<?php

namespace CentralCondo\Entities\Portal\Communication\Called;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CalledStatus extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'called_status';

    protected $fillable = [
        'name',
        'active'
    ];

    public function calledHistoric()
    {
        return $this->belongsTo(CalledHistoric::class);
    }

    public function called()
    {
        return $this->hasMany(Called::class);
    }

}
