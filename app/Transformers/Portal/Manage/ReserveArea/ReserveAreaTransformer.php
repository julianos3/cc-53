<?php

namespace CentralCondo\Transformers\Portal\Manage\ReserveAreas;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\ReserveArea\ReserveArea;

/**
 * Class ReserveAreaTransformer
 * @package CentralCondo\Transformers\Portal\Manage\ReserveArea
 */
class ReserveAreaTransformer extends TransformerAbstract
{

    /**
     * @param ReserveArea $model
     * @return array
     */
    public function transform(ReserveArea $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
