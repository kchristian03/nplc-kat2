<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\Attributes\On;

class PlayerStats extends Component
{

    public $teamId;

    #[On('item-used')]
    #[On('item-bought')]
    public function render()
    {
        return view('livewire.player-stats',[
            'teamData'=> Team::find($this->teamId)
        ]);
    }
}
