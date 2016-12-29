<?php

namespace CentralCondo\Events\Portal\Condominium\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

class SendMailNotConfirmedUser
{
    use InteractsWithSockets, SerializesModels;

    public $userCondominiumId;

    /**
     * SendMailConfirmedUser constructor.
     * @param $userCondominiumId
     */
    public function __construct($userCondominiumId)
    {
        $this->user_condominium_id = $userCondominiumId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
