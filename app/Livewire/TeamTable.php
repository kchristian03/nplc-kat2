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
use Illuminate\Support\Facades\Session;

class TeamTable extends Component
{

    public $playingteams1 = [];
    public $posId;

    public function mount($playingteams = null, $posId = null){
        foreach($playingteams as $playingteam){
            $team = Team::find($playingteam);
            $this->playingteams1[] = $team;
        }

        $this->posId = $posId;

    }

    public function render()
    {
        return view('livewire.team-table');
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
            } else if ($itemuse->code == "EXP") {
                $newExp += $this->doubleExp($pos->exp_won, $itemuse->duration);
            }
        }

        $team->update([
            'score' => $newScore,
            'coin' => $newCoin,
            'exp' => $newExp
        ]);

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
        $current = Session::get('playingteams', []);

        // Use filter to create a new array excluding the team with the given ID
        $newPlayingTeams = array_filter($current, function ($playingTeam) use ($team) {
            return $playingTeam->id !== $team->id;
        });

        Session::put('playingteams', $newPlayingTeams);

        broadcast(new Won($team->user->id, $pos->id))->toOthers();
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
            }
        }

        $team->update([
            'score' => $newScore,
            'coin' => $newCoin,
            'exp' => $newExp
        ]);

        Result::create([
            'coin' => $pos->coin_lost,
            'exp' => $pos->exp_lost,
            'score' => $pos->score_lost,
            'team_id' => $team->id,
            'pos_id' => $pos->id
        ]);

        broadcast(new Lost($team->user->id, $pos->id))->toOthers();
        $current = Session::get('playingteams', []);

        // Use filter to create a new array excluding the team with the given ID
        $newPlayingTeams = array_filter($current, function ($playingTeam) use ($team) {
            return $playingTeam->id !== $team->id;
        });

        Session::put('playingteams', $newPlayingTeams);
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
}
