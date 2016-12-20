<?php

namespace CentralCondo\Transformers\Portal\Condominium\Diary;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Condominium\Diary\Diary;

/**
 * Class DiaryTransformer
 * @package CentralCondo\Transformers\Portal\Condominium\Diary
 */
class DiaryTransformer extends TransformerAbstract
{

    /**
     * @param Diary $model
     * @return array
     */
    public function transform(Diary $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
