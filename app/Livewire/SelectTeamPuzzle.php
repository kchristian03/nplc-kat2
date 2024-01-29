<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\Puzzle;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class SelectTeamPuzzle extends Component
{

    public $pos_code;
    public Puzzle $puzzle;

    #[On('start-puzzle')]
    public function render()
    {

        Log::info("Reload Select Team Puzzle".$this->pos_code);
        return view('livewire.select-team-puzzle',[
            'teams'=>Team::where('progress',$this->pos_code)->get()
        ]);
    }



}
