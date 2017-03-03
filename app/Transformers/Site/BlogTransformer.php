<?php

namespace CentralCondo\Transformers;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Blog;

/**
 * Class BlogTransformer
 * @package namespace CentralCondo\Transformers;
 */
class BlogTransformer extends TransformerAbstract
{

    /**
     * Transform the \Blog entity
     * @param \Blog $model
     *
     * @return array
     */
    public function transform(Blog $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
