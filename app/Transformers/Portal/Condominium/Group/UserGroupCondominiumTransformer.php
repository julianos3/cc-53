<?php

namespace CentralCondo\Transformers\Portal\Condominium\Group;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Group\UserGroupCondominium;

/**
 * Class UserGroupCondominiumTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Group
 */
class UserGroupCondominiumTransformer extends TransformerAbstract
{

    /**
     * @param UserGroupCondominium $model
     * @return array
     */
    public function transform(UserGroupCondominium $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
