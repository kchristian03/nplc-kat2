<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class PlayerModal extends Component
{
    #[On('item-used')]
    #[On('item-bought')]
    public function render()
    {
        return view('livewire.player-modal');
    }
}
