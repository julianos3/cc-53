<?php

namespace CentralCondo\Transformers\Portal\Communication\Called;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Called\CalledHistoric;

/**
 * Class CalledHistoricTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Called
 */
class CalledHistoricTransformer extends TransformerAbstract
{

    /**
     * @param CalledHistoric $model
     * @return array
     */
    public function transform(CalledHistoric $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
