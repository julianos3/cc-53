<?php

namespace CentralCondo\Transformers\Portal\Communication\Message;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Commnunication\Message\MessageGroup;

/**
 * Class MessageGroupTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Message
 */
class MessageGroupTransformer extends TransformerAbstract
{

    /**
     * @param MessageGroup $model
     * @return array
     */
    public function transform(MessageGroup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
