<?php

namespace CentralCondo\Transformers\Portal;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\State;

/**
 * Class StateTransformer
 * @package CentralCondo\Transformers\Portal
 */
class StateTransformer extends TransformerAbstract
{

    /**
     * @param State $model
     * @return array
     */
    public function transform(State $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
