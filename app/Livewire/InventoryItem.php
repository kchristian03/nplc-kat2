<?php

namespace App\Livewire;

use Livewire\Component;

class InventoryItem extends Component
{
    public $item;


    public function mount($item = null){
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.inventory-item');
    }
}
