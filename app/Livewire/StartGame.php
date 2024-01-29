<?php

namespace App\Livewire;

use App\Models\Pos;
use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use App\Events\StartRally;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class StartGame extends Component
{

    public User $user;
    public Pos $pos;
    public Team $team;

    public function render()
    {
        return view('livewire.start-game');
    }


    public function start_game(){

        broadcast(new StartRally($this->pos, $this->user))->toOthers();

        $this->dispatch('start-rally', $this->team, $this->pos);
    }
}
