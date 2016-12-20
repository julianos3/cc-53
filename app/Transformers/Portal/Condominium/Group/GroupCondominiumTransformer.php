<?php

namespace CentralCondo\Transformers\Portal\Condominium\Group;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Group\GroupCondominium;

/**
 * Class GroupCondominiumTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Group
 */
class GroupCondominiumTransformer extends TransformerAbstract
{

    /**
     * @param GroupCondominium $model
     * @return array
     */
    public function transform(GroupCondominium $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
