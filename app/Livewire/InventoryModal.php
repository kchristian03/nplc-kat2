<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TeamItem;
use Livewire\Attributes\On;

class InventoryModal extends Component
{

    public $team_id;

    #[On('item-used')]
    #[On('item-bought')]
    public function render()
    {
        return view('livewire.inventory-modal',[
            "items"=>TeamItem::where('team_id',auth()->user()->team->id)->get()
        ]);
    }

}
