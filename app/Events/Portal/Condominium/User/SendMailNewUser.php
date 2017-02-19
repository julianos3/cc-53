<?php

namespace CentralCondo\Events\Portal\Condominium\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

class SendMailNewUser
{
    use InteractsWithSockets, SerializesModels;

    public $condominium_id;

    public $user_name;

    /**
     * SendMailNewUser constructor.
     * @param $condominium_id
     * @param $user_name
     */
    public function __construct($condominium_id, $user_name)
    {
        $this->condominium_id = $condominium_id;
        $this->user_name = $user_name;
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
