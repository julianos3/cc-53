<?php

namespace CentralCondo\Transformers\Portal\Condominium\Block;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Block\BlockNomemclature;

/**
 * Class BlockNomemclatureTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Block
 */
class BlockNomemclatureTransformer extends TransformerAbstract
{

    /**
     * @param BlockNomemclature $model
     * @return array
     */
    public function transform(BlockNomemclature $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
