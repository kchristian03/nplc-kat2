<?php

namespace App\Events;

use App\Models\Pos;
use App\Models\User;
use App\Models\Puzzle;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StartPuzzle implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     private User $user;
     public $puzzleId;
    public function __construct(Puzzle $puzzle, User $user)
    {
        $this->user = $user;
        $this->puzzleId =$puzzle->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('StartPuzzle.user.'.$this->user->id),
        ];
    }

    public function broadcastAs(){
        return "start_puzzle";
    }
}
