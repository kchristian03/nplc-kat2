<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Play extends Component
{

    #[On('item-used')]
    #[On('item-bought')]
    public function render()
    {
        return view('player.index');
    }
}
