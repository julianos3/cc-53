<?php

namespace CentralCondo\Transformers\Portal\Communication\Called;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Called\CalledCategory;

/**
 * Class CalledCategoryTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Called
 */
class CalledCategoryTransformer extends TransformerAbstract
{

    /**
     * @param CalledCategory $model
     * @return array
     */
    public function transform(CalledCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
