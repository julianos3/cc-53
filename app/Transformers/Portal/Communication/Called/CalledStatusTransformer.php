<?php

namespace CentralCondo\Transformers\Portal\Communication\Called;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Called\CalledStatus;

/**
 * Class CalledStatusTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Called
 */
class CalledStatusTransformer extends TransformerAbstract
{

    /**
     * @param CalledStatus $model
     * @return array
     */
    public function transform(CalledStatus $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
