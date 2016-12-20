<?php

namespace CentralCondo\Transformers\Portal\Manage\Contract;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\Contract\ContractStatus;

/**
 * Class ContractStatusTransformer
 * @package CentralCondo\Transformers\Portal\Manage\Contract
 */
class ContractStatusTransformer extends TransformerAbstract
{

    /**
     * @param ContractStatus $model
     * @return array
     */
    public function transform(ContractStatus $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
