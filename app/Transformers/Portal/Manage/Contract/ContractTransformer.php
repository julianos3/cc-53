<?php

namespace CentralCondo\Transformers\Portal\Manage\Contract;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\Contract\Contract;

/**
 * Class ContractTransformer
 * @package CentralCondo\Transformers\Portal\Manage\Contract
 */
class ContractTransformer extends TransformerAbstract
{

    /**
     * @param Contract $model
     * @return array
     */
    public function transform(Contract $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
