<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $countNotifications;
    public array $data;

    public function __construct(int $countNotifications, array $data)
    {
        $this->countNotifications = $countNotifications;
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notification-channel');
    }
}
