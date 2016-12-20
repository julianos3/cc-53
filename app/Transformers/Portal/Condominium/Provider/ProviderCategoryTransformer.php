<?php

namespace CentralCondo\Transformers\Portal\Condominium\Provider;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Provider\ProviderCategory;

/**
 * Class ProviderCategoryTransformer
 * @package namespace CentralCondo\Transformers;
 */
class ProviderCategoryTransformer extends TransformerAbstract
{

    /**
     * @param ProviderCategory $model
     * @return array
     */
    public function transform(ProviderCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
