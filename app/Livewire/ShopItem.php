<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Team;
use Livewire\Component;
use App\Models\TeamItem;
use Illuminate\Support\Facades\Http;
use LivewireUI\Modal\ModalComponent;

class ShopItem extends Component
{
    public $item;


    public function mount($item = null){
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.shop-item');
    }


}
