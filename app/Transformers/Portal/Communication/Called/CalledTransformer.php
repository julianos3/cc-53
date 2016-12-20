<?php

namespace CentralCondo\Transformers\Portal\Communication\Called;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Called\Called;

/**
 * Class CalledTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Called
 */
class CalledTransformer extends TransformerAbstract
{

    /**
     * @param Called $model
     * @return array
     */
    public function transform(Called $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
