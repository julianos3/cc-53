<?php

namespace CentralCondo\Transformers\Portal\Communication\Communication;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\CommunicationGroup;

/**
 * Class CommunicationGroupTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Communication
 */
class CommunicationGroupTransformer extends TransformerAbstract
{

    /**
     * @param CommunicationGroup $model
     * @return array
     */
    public function transform(CommunicationGroup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
