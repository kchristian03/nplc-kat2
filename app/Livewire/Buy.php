<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Team;
use Livewire\Component;
use App\Models\TeamItem;

class Buy extends Component
{

    public $team_id;
    public $item_id;
    public $price;

    public function render()
    {
        return view('livewire.buy');
    }
    public function buy()
    {
        $team = Team::find($this->team_id);
        $item = Item::find($this->item_id);

            if($team->coin >= $item->price){

                $newCoinValue = $team->coin - $item->price;

                $team->update(['coin' => $newCoinValue]);

                TeamItem::create([
                    'team_id' => $team->id,
                    'item_id' => $item->id,
                ]);
            }

            $this->dispatch('item-bought');
    }
}
