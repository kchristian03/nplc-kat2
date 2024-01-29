<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\User;
use App\Models\Puzzle;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\StartPuzzle as EventStartPuzzle;


class StartPuzzle extends Component
{

    public User $user;
    public Puzzle $puzzle;
    public Team $team;

    public function render()
    {
        return view('livewire.start-puzzle');
    }

    public function start_puzzle(){

        broadcast(new EventStartPuzzle($this->puzzle, $this->user))->toOthers();
        $newCoin = $this->team->coin - $this->puzzle->entry_coin;
        $this->team->update([
            'coin'=>$newCoin
        ]);

        $this->dispatch('start-puzzle', $this->team, $this->puzzle);
    }
}
