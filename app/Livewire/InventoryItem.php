<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\TeamItem;

class InventoryItem extends Component
{
    public Item $item;


    public function mount(TeamItem $teamItem = null){
        $this->item = Item::find($teamItem->item_id);
    }

    public function render()
    {
        return view('livewire.inventory-item');
    }
}
