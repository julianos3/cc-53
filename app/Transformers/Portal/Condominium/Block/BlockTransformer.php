<?php

namespace CentralCondo\Transformers\Portal\Condominium\Block;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Block\Block;

/**
 * Class BlockTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Block
 */
class BlockTransformer extends TransformerAbstract
{

    /**
     * @param Block $model
     * @return array
     */
    public function transform(Block $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
