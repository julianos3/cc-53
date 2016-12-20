<?php

namespace CentralCondo\Transformers\Portal\Condominium\Provider;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Provider\Provider;

/**
 * Class ProviderTransformer
 * @package namespace CentralCondo\Transformers;
 */
class ProviderTransformer extends TransformerAbstract
{

    /**
     * @param Provider $model
     * @return array
     */
    public function transform(Provider $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
