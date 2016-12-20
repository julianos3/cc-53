<?php

namespace CentralCondo\Transformers\Portal\Condominium\Condominium;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;

/**
 * Class UserCondominiumTransformer
 * @package CentralCondo\Transformers\Portal\User
 */
class UserCondominiumTransformer extends TransformerAbstract
{

    /**
     * @param UserCondominium $model
     * @return array
     */
    public function transform(UserCondominium $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
