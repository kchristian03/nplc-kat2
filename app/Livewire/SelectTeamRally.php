<?php

namespace App\Livewire;

use App\Models\Pos;
use App\Models\Team;
use Livewire\Component;
use Livewire\Attributes\On;

class SelectTeamRally extends Component
{

    public Pos $pos;
    #[On('start-rally')]
    public function render()
    {

        return view('livewire.select-team-rally',[
            'teams'=> Team::all()
        ]);
    }

}
