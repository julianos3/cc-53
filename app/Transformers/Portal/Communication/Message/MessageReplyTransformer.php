<?php

namespace CentralCondo\Transformers\Portal\Communication\Message;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Commnunication\Message\MessageReply;

/**
 * Class MessageReplyTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Message
 */
class MessageReplyTransformer extends TransformerAbstract
{

    /**
     * @param MessageReply $model
     * @return array
     */
    public function transform(MessageReply $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
