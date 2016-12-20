<?php

namespace CentralCondo\Transformers\Portal\Condominium\Finality;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Finality\Finality;

/**
 * Class FinalityTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Finality
 */
class FinalityTransformer extends TransformerAbstract
{

    /**
     * @param Finality $model
     * @return array
     */
    public function transform(Finality $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
