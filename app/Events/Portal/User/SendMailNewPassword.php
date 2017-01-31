<?php

namespace CentralCondo\Events\Portal\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMailNewPassword
{
    use InteractsWithSockets, SerializesModels;

    public $dados;

    public $password;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($dados, $password)
    {
        $this->dados = $dados;
        $this->password = $password;
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
