<?php

namespace CentralCondo\Transformers\Site;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Site\Newsletter;

/**
 * Class NewsletterTransformer
 * @package CentralCondo\Transformers\Site]
 */
class NewsletterTransformer extends TransformerAbstract
{

    /**
     * Transform the \Newsletter entity
     * @param \Newsletter $model
     *
     * @return array
     */
    public function transform(Newsletter $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
