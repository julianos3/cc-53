<?php

namespace CentralCondo\Transformers\Portal\Condominium\Condominium;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;

/**
 * Class CondominiumTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Condominium
 */
class CondominiumTransformer extends TransformerAbstract
{

    /**
     * @param Condominium $model
     * @return array
     */
    public function transform(Condominium $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
