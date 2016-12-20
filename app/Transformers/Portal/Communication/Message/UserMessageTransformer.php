<?php

namespace CentralCondo\Transformers\Portal\Communication\Message;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Commnunication\Message\UserMessage;

/**
 * Class UserMessageTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Message
 */
class UserMessageTransformer extends TransformerAbstract
{

    /**
     * @param UserMessage $model
     * @return array
     */
    public function transform(UserMessage $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
