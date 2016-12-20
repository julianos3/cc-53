<?php

namespace CentralCondo\Transformers\Portal\Condominium\Unit;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Unit\Unit;

/**
 * Class UnitTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Unit
 */
class UnitTransformer extends TransformerAbstract
{

    /**
     * @param Unit $model
     * @return array
     */
    public function transform(Unit $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
