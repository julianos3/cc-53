<?php

namespace CentralCondo\Transformers\Portal\Condominium\Unit;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Unit\UserUnit;

/**
 * Class UserUnitTransformer
 * @package CentralCondo\Transformers\Portal\User
 */
class UserUnitTransformer extends TransformerAbstract
{

    /**
     * @param UserUnit $model
     * @return array
     */
    public function transform(UserUnit $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
