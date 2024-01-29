<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GlobalTimer;
use App\Events\GlobalTimerStop;

class StopGlobalTimer extends Component
{
    #[On('stop')]
    public function render()
    {
        return view('livewire.stop-global-timer',[
            'globaltimer'=> GlobalTimer::orderBy('id', 'desc')->first()
        ]);
    }

    public function stop(){

        $this->dispatch('stop');
        broadcast(new GlobalTimerStop());
    }
}
