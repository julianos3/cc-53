<?php

namespace CentralCondo\Entities\Portal\Condominium\SecurityCam;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SecurityCam extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'security_cam';

    protected $fillable = [
        'condominium_id',
        'name',
        'url'
    ];

    public function condominium()
    {
        return $this-$this->belongsTo(Condominium::class);
    }

}
