<?php

namespace CentralCondo\Entities\Portal\Condominium\Provider;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProviderCategory extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'provider_category';

    protected $fillable = [
        'name',
        'active'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

}
