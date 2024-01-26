<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ShopModal extends Component
{
    public function render()
    {
        return view('livewire.shop-modal',[
            "items"=>Item::all()
        ]);
    }
}
