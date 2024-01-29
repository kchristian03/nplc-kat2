<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class Leaderboard extends Component
{
    public function render()
    {
        return view('livewire.leaderboard',[
            'teams' => Team::orderBy('score', 'DESC')->take(10)->get()
        ]);
    }
}
