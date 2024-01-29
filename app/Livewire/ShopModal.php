<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class ShopModal extends Component
{

    #[On('item-bought')]
    public function render()
    {
        return view('livewire.shop-modal',[
            "items"=>Item::all()
        ]);
    }
}
