<?php

namespace App\Livewire;

use App\Events\Won;
use App\Models\Pos;
use App\Events\Lost;
use App\Models\Item;
use App\Models\Team;
use App\Models\Result;
use Livewire\Component;
use App\Models\TeamItem;
use Livewire\Attributes\On;
use App\Models\PlayingRally;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TeamTable extends Component
{

    // public $playingteams = [];
    public $posId;

    #[On('start-rally')]
    public function update(Team $team = null, Pos $pos = null){
        $this->posId = $pos->id;
        PlayingRally::create([
            'team_id'=> $team->id,
            'pos_id'=> $pos->id,
        ]);
        // $sessionData = $this->getSessionData();
        // Log::info('Session Data');
        // Log::info($sessionData);
        // Log::info(Session::all());
        //     $this->playingteams = $sessionData;
        //     $this->playingteams = array_merge($this->playingteams, [$team]);
        //     $this->posId = $pos->id;
        //     $this->putSessionData();
    }

    #[On('refresh-table')]
    public function refresh($team_id){
        $playingrally = PlayingRally::where('team_id',$team_id)->first();
        $playingrally->delete();
        // Log::info("Saat Refresh");
        // Log::info($this->playingteams);
    }

    // protected $listeners = [
    //     'refreshTeamTable' => 'updateTable'
    // ];

    public function render()
    {
        // $this->playingteams = $this->getSessionData();
        return view('livewire.team-table',[
            'playingteams'=> PlayingRally::where('pos_id',$this->posId)->get()
        ]);
    }

    public function wonGame(Team $team)
    {
        $pos = Pos::find($this->posId);

        $newScore = $team->score + $pos->score_won;
        $newCoin = $team->coin; // Initialize with the current coin value
        $newExp = $team->exp;   // Initialize with the current exp value


            foreach ($team->itemusage as $itemuse) {
                if ($itemuse->code == "COIN") {
                    $newCoin += $this->doubleCoin($pos->coin_won, $itemuse->duration);
                } elseif ($itemuse->code == "EXP") {
                    $newExp += $this->doubleExp($pos->exp_won, $itemuse->duration);
                }
            }


        Log::info("Team before update:{$team}");
        $team->update([
            'score' => $newScore,
            'coin' => $newCoin,
            'exp' => $newExp
        ]);

        Log::info("Team after update:{$team}");

        Result::create([
            'coin' => $pos->coin_won,
            'exp' => $pos->exp_won,
            'score' => $pos->score_won,
            'team_id' => $team->id,
            'pos_id' => $pos->id
        ]);

        $random = mt_rand(0, 100);

        if ($pos->item_rate >= $random) {
            $item = Item::where("code", $pos->item_won)->first();
            TeamItem::create([
                'team_id' => $team->id,
                'item_id' => $item->id
            ]);
        }

        broadcast(new Won($team->user->id, $pos->id))->toOthers();
        // $current = Session::get('playingteams');

        // Log::info($current);
        // Log::info("Team:{$team}");
        // Log::info("Pos:{$pos}");
        // $newPlayingTeams = array_filter($this->playingteams, function ($playingTeam) use ($team) {
        //     return $playingTeam->id != $team->id;
        // });

        // Log::info("Setelah Filter");
        // Log::info($newPlayingTeams);
        // $this->playingteams = $newPlayingTeams;
        // $this->putSessionData();

        $this->dispatch('refresh-table', $team->id)->self();
    }

    public function lostGame(Team $team)
    {
        $pos = Pos::find($this->posId);

        $newScore = $team->score + $pos->score_lost;
        $newCoin = $team->coin;
        $newExp = $team->exp;
        foreach($team->itemusage as $itemuse){
            if($itemuse->code == "COIN"){
                $newCoin = $team->coin + $this->doubleCoin($pos->coin_lost, $itemuse->duration);
            }else if($itemuse->code == "EXP"){
                $newExp = $team->exp + $this->doubleExp($pos->exp_lost, $itemuse->duration);
            }else{
                $newCoin = $team->coin + $pos->coin_lost;
                $newExp = $team->exp + $pos->exp_lost;
            }
        }

        Log::info("Team before update:{$team}");
        $team->update([
            'score' => $newScore,
            'coin' => $newCoin,
            'exp' => $newExp
        ]);

        Log::info("Team after update:{$team}");

        Result::create([
            'coin' => $pos->coin_lost,
            'exp' => $pos->exp_lost,
            'score' => $pos->score_lost,
            'team_id' => $team->id,
            'pos_id' => $pos->id
        ]);

        broadcast(new Lost($team->user->id, $pos->id))->toOthers();
        // $current = Session::get('playingteams');

        // // Log::info($current);
        // Log::info("Team:{$team}");
        // Log::info("Pos:{$pos}");
        // $newPlayingTeams = array_filter($this->playingteams, function ($playingTeam) use ($team) {
        //     return $playingTeam->id != $team->id;
        // });

        // Log::info("Setelah Filter");
        // Log::info($newPlayingTeams);
        // $this->playingteams = $newPlayingTeams;
        // $this->putSessionData();
        $this->dispatch('refresh-table', $team->id)->self();
    }

    private function doubleCoin($coin, $duration){
        if(strtotime($duration) > strtotime(now())) {
            return $coin * 2;
        } else {
            return $coin;
        }
    }

    private function doubleExp($exp, $duration){
        if(strtotime($duration) > strtotime(now())){
            return $exp * 2;
        }else{
            return $exp;
        }
    }

    // private function getSessionData(){
    //     $sessionData = Session::get('playingteams');
    //     if(!empty($sessionData)){
    //         foreach($sessionData as $sd){
    //             $data[] = Team::find($sd);
    //             return $data;
    //         }
    //     }else{
    //         return [];
    //     }
    // }

    // private function putSessionData(){
    //     $sessionData= [];
    //     Log::info('data when put into session');
    //     Log::info($this->playingteams);
    //     foreach($this->playingteams as $d){
    //         Log::info('singular data get id');
    //         $sessionData[] = $d->id;
    //     }

    //     Session::put('playingteams', $sessionData);
    // }
}
