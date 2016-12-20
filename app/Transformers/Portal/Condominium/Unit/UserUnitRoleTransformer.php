<?php

namespace CentralCondo\Transformers\Portal\Condominium\Unit;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Unit\UserUnitRole;

/**
 * Class UserUnitRoleTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\UNit
 */
class UserUnitRoleTransformer extends TransformerAbstract
{

    /**
     * @param UserUnitRole $model
     * @return array
     */
    public function transform(UserUnitRole $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
