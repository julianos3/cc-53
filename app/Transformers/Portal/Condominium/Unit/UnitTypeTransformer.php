<?php

namespace CentralCondo\Transformers\Portal\Condominium\Unit;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Unit\UnitType;

/**
 * Class UnitTypeTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Unit
 */
class UnitTypeTransformer extends TransformerAbstract
{

    /**
     * @param UnitType $model
     * @return array
     */
    public function transform(UnitType $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
