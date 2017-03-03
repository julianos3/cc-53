<?php

namespace CentralCondo\Transformers;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Contact;

/**
 * Class ContactTransformer
 * @package namespace CentralCondo\Transformers;
 */
class ContactTransformer extends TransformerAbstract
{

    /**
     * Transform the \Contact entity
     * @param \Contact $model
     *
     * @return array
     */
    public function transform(Contact $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
