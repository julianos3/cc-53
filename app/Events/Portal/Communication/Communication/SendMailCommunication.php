<?php

namespace CentralCondo\Events\Portal\Communication\Communication;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMailCommunication
{
    use InteractsWithSockets, SerializesModels;

    public $communicationId;

    public $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($communicationId, $action)
    {
        $this->communicationId = $communicationId;
        $this->action = $action;
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
