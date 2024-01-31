<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GlobalTimer;
use Livewire\Attributes\On;
use App\Events\GlobalTimerStart;

class StartGlobalTimer extends Component
{

    #[On('start')]
    public function render()
    {
        return view('livewire.start-global-timer',[
            'globaltimer'=> GlobalTimer::orderBy('id', 'desc')->first()
        ]);
    }

    public function start(){
        GlobalTimer::create([
            'game_duration'=>now()->addMinutes(250)
        ]);

        $this->dispatch('start');
        broadcast(new GlobalTimerStart());
    }
}
