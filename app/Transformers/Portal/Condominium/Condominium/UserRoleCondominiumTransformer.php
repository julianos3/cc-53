<?php

namespace CentralCondo\Transformers\Portal\Condominium\Condominium;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserRoleCondominium;

/**
 * Class UserRoleCondominiumTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Condominium
 */
class UserRoleCondominiumTransformer extends TransformerAbstract
{

    /**
     * @param UserRoleCondominium $model
     * @return array
     */
    public function transform(UserRoleCondominium $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
