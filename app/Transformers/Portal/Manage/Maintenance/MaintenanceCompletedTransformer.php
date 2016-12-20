<?php

namespace CentralCondo\Transformers\Portal\Manage\Maintenance;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\Maintenance\MaintenanceCompleted;

/**
 * Class MaintenanceCompletedTransformer
 * @package CentralCondo\Transformers\Portal\Manage\Maintenance
 */
class MaintenanceCompletedTransformer extends TransformerAbstract
{

    /**
     * @param MaintenanceCompleted $model
     * @return array
     */
    public function transform(MaintenanceCompleted $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
