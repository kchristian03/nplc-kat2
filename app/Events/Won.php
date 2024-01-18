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

class Won implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     private $data;
     public $result;
     public $won = true;
    public function __construct(string $userId, string $pos)
    {
        $this->result = $pos;
        $this->data = $userId;
        $this->won;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('PosWon.user.'.$this->data),
        ];
    }

    public function broadcastAs(){
        return "pos_won";
    }
}
