<?php

namespace CentralCondo\Transformers\Portal\Condominium\SecurityCam;

use CentralCondo\Entities\Portal\Condominium\SecurityCam\SecurityCam;
use League\Fractal\TransformerAbstract;

/**
 * Class SecurityCamTransformer
 * @package namespace CentralCondo\Transformers;
 */
class SecurityCamTransformer extends TransformerAbstract
{

    /**
     * @param SecurityCam $model
     * @return array
     */
    public function transform(SecurityCam $model)
    {
        return [
            'id' => (int)$model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
