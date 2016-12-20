<?php

namespace CentralCondo\Transformers\Portal\User;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\User\UserRole;

/**
 * Class UserRoleTransformer
 * @package CentralCondo\Transformers\Portal\User
 */
class UserRoleTransformer extends TransformerAbstract
{

    /**
     * @param UserRole $model
     * @return array
     */
    public function transform(UserRole $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
