<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Team;
use Livewire\Component;
use App\Models\TeamItem;
use App\Models\ItemUsage;
use App\Events\SpecialItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UseItem extends Component
{
    public $team_id;
    public $item_id;

    public function render()
    {
        return view('livewire.use-item');
    }

    public function use_item(){
        $item = Item::find($this->item_id);
        $teamItem = TeamItem::where("team_id", $this->team_id)->where("item_id", $this->item_id)->first();
        $team = Team::find($this->team_id);
        $patterns = ['/COIN/i', '/EXP/i'];

        Log::info("Entering the loop");

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $item->code, $matches)) {
                Log::info($matches[0]);
                $expirationTime = now()->addMinutes($item->duration);
                $now = now();
                Session::put($matches[0], $expirationTime);
                $teamItem->delete();
                $sessionExpiraton = Session::get($matches[0]);
                $itemUsage = ItemUsage::where("team_id", $this->team_id)->where("code", $matches[0])->first();
                if(!empty($itemUsage)){
                    $itemUsage->update([
                        'duration'=>$expirationTime
                    ]);
                }else{
                    ItemUsage::create([
                        'team_id' => $this->team_id,
                        'code' => $matches[0],
                        'duration'=> $expirationTime
                    ]);
                }
                Log::info("Item used. Code: {$item->code}, Team Item ID: {$this->item_id}, expiration time : {$expirationTime}, now : {$now}, sesson expiration: {$sessionExpiraton}, Matches: {$matches[0]}");
                break;
            }else{
                $message = "Team ".$team->name." used ".$item->name;
                broadcast(new SpecialItem($message,$team->user));
                Log::info($message);
                $teamItem->delete();
            }
        }

        Log::info("Exiting the loop");

        $this->dispatch('item-used');
    }
}
