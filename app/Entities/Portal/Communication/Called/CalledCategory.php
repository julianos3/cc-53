<?php

namespace CentralCondo\Entities\Portal\Communication\Called;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CalledCategory extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'called_category';

    protected $fillable = [
        'name',
        'active'
    ];

    public function called()
    {
        return $this->belongsTo(Called::class);
    }

}
