<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Team;
use Livewire\Component;
use App\Models\TeamItem;
use App\Events\SpecialItem;
use Illuminate\Support\Facades\Log;

class UseHint extends Component
{

    public $team_id;
    public $item_id;
    public $hintClicked = false;

    #[On('update')]
    public function render()
    {
        return view('livewire.use-hint');
    }

    public function hint()
    {
        $item = Item::find($this->item_id);
        $teamItem = TeamItem::where("team_id", $this->team_id)->where("item_id", $this->item_id)->first();
        $team = Team::find($this->team_id);

        if (!empty($teamItem)) {
            $message = "Team ".$team->name." used ".$item->name;
            Log::info($message);
            Log::info($team->user);
            $teamItem->delete();
            broadcast(new SpecialItem($message,$team->user));
        }

        $this->dispatch('update');

        $this->hintClicked = true;
    }
}
