<?php

namespace App\Events;

use App\Models\Pos;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Lost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     private $data;
     public $result;
     public $lost = true;
    public function __construct(string $userId, string $pos)
    {
        $this->data = $userId;
        $this->result = $pos;
        $this->lost;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('PosLost.user.'.$this->data),
        ];
    }

    public function broadcastAs(){
        return "pos_lost";
    }
}
