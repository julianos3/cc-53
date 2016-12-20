<?php

namespace CentralCondo\Transformers\Portal\User;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\User\User;

/**
 * Class UserTransformer
 * @package CentralCondo\Transformers\Portal\User
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
