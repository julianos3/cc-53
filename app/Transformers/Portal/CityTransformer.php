<?php

namespace CentralCondo\Transformers\Portal;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\City;

/**
 * Class CityTransformer
 * @package CentralCondo\Transformers\Portal
 */
class CityTransformer extends TransformerAbstract
{

    /**
     * @param City $model
     * @return array
     */
    public function transform(City $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
