<?php

namespace CentralCondo\Transformers\Portal\Manage\Maintenance;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\Maintenance\Maintenance;

/**
 * Class MaintenanceTransformer
 * @package CentralCondo\Transformers\Portal\Manage\Maintenance
 */
class MaintenanceTransformer extends TransformerAbstract
{

    /**
     * @param Maintenance $model
     * @return array
     */
    public function transform(Maintenance $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
