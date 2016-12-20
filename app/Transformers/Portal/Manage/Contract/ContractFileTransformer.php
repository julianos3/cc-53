<?php

namespace CentralCondo\Transformers\Portal\Manage\Contract;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Manage\Contract\ContractFile;

/**
 * Class ContractFileTransformer
 * @package CentralCondo\Transformers\Portal\Manage\Contract
 */
class ContractFileTransformer extends TransformerAbstract
{

    /**
     * @param ContractFile $model
     * @return array
     */
    public function transform(ContractFile $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
