<?php

namespace CentralCondo\Transformers\Portal\Communication\Notification;

use League\Fractal\TransformerAbstract;
use CentralCondo\Entities\Portal\Communication\Notification\Notification;

/**
 * Class NotificationTransformer
 * @package CentralCondo\Transformers\Portal\Communication\Notification
 */
class NotificationTransformer extends TransformerAbstract
{

    /**
     * @param Notification $model
     * @return array
     */
    public function transform(Notification $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
