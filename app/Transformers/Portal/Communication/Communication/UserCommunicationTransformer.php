<?php

namespace CentralCondo\Transformers\Portal\Communication\Communication;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Communication\UserCommunication;

/**
 * Class UserCommunicationTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Communication
 */
class UserCommunicationTransformer extends TransformerAbstract
{

    /**
     * @param UserCommunication $model
     * @return array
     */
    public function transform(UserCommunication $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
