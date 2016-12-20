<?php

namespace CentralCondo\Transformers\Portal\Communication\Communication;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Communication;

/**
 * Class CommunicationTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Communication
 */
class CommunicationTransformer extends TransformerAbstract
{

    /**
     * @param Communication $model
     * @return array
     */
    public function transform(Communication $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
