<?php

namespace CentralCondo\Transformers\Portal\Manage\Periodicity;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\Periodicity\Periodicity;

/**
 * Class PeriodicityTransformer
 * @package CentralCondo\Transformers\Portal\Manage\Periodicity
 */
class PeriodicityTransformer extends TransformerAbstract
{

    /**
     * @param Periodicity $model
     * @return array
     */
    public function transform(Periodicity $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
