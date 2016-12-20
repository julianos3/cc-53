<?php

namespace CentralCondo\Transformers\Portal\Communication\Message;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Commnunication\Message\Message;

/**
 * Class MessageTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Message
 */
class MessageTransformer extends TransformerAbstract
{

    /**
     * @param Message $model
     * @return array
     */
    public function transform(Message $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
