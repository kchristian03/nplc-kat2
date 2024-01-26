<?php

namespace App\Livewire;

use Livewire\Component;

class InventoryModal extends Component
{
    public function render()
    {
        return view('livewire.inventory-modal',[
            "items"=>auth()->user()->team->item
        ]);
    }
}
