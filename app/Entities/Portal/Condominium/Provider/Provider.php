<?php

namespace CentralCondo\Entities\Portal\Condominium\Provider;

use CentralCondo\Entities\Portal\Manage\Contract\Contract;
use CentralCondo\Entities\Portal\Manage\Maintenance\MaintenanceCompleted;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Provider extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'provider';

    protected $fillable = [
        'condominium_id',
        'provider_category_id',
        'name',
        'description',
        'active'
    ];

    public function providerCategory()
    {
        return $this->belongsTo(ProviderCategory::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function maintenanceCompleted()
    {
        return $this->belongsTo(MaintenanceCompleted::class);
    }

}
