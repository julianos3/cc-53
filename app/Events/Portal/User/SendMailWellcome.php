<?php

namespace CentralCondo\Events\Portal\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMailWellcome
{
    use InteractsWithSockets, SerializesModels;

    public $userCondominiumId;
    /**
     * Create a new event instance.
     *
     * @return void
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
