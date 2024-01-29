<?php

namespace App\Livewire;

use App\Events\Mid;
use App\Events\Won;
use App\Events\Lost;
use App\Models\Team;
use App\Events\Forfit;
use App\Models\Puzzle;
use Livewire\Component;
use App\Events\StartTimer;
use App\Models\BonusScore;
use Livewire\Attributes\On;
use App\Models\PlayingPuzzle;
use App\Models\PuzzleCompletion;

class PuzzleTable extends Component
{
    public $puzzleId;

    #[On('start-puzzle')]
    public function update(Team $team = null, Puzzle $puzzle = null){
        $this->puzzleId = $puzzle->id;
        PlayingPuzzle::create([
            'team_id'=> $team->id,
            'puzzle_id'=> $puzzle->id,
        ]);

    }

    #[On('refresh-table')]
    public function refresh($team_id){
        $playingpuzzle = PlayingPuzzle::where('team_id',$team_id)->first();
        $playingpuzzle->delete();
    }


    #[On('start-timer')]
    public function render()
    {
        // $this->playingteams = $this->getSessionData();
        return view('livewire.puzzle-table',[
            'playingteams'=> PlayingPuzzle::where('puzzle_id',$this->puzzleId)->get()
        ]);
    }

    public function startPuzzle(Team $team)
    {
        $puzzle = Puzzle::where('id',$this->puzzleId)->first();

        $playingpuzzle = PlayingPuzzle::where('team_id',$team->id)->first();
        $playingpuzzle->update([
            'duration'=> now()->addMinutes($puzzle->time)
        ]);

        broadcast(new StartTimer($team->user->id))->toOthers();
        $this->dispatch('start-timer');
    }

    public function lostPuzzle(Team $team)
    {
        $puzzle = Puzzle::where('id',$this->puzzleId)->first();

        $pos = $puzzle->id;

        $progress_story = $puzzle->pos_code."BAD";

        PuzzleCompletion::create([
            'team_id'=> $team->id,
            'puzzle'=> $puzzle->pos_code
        ]);

        $puzzlesection = preg_replace("/[^0-9]/", "", $puzzle->pos_code);
        if (!empty($puzzlesection)) {
            $code = (int) $puzzlesection;
            $completions = count(PuzzleCompletion::where('puzzle', 'LIKE', '%' . $code . '%')->get());
            $bonus = ($completions > 0) ? BonusScore::find($completions) : null;
        }

        $newScore = $team->score + $puzzle->score_lost + (($bonus !== null) ? $bonus->$code : 0);

        $team->update([
            'score'=> $newScore,
            'progress'=> $puzzle->code_lost,
            'progress_story'=>$progress_story
        ]);

        broadcast(new Lost($team->user->id, $pos))->toOthers();

        $this->dispatch('refresh-table', $team->id);
    }

    public function wonPuzzle(Team $team)
    {
        $puzzle = Puzzle::where('id',$this->puzzleId)->first();

        $pos = $this->puzzleId;


        $progress_story = $puzzle->pos_code."GOOD";

        PuzzleCompletion::create([
            'team_id'=> $team->id,
            'puzzle'=> $puzzle->pos_code
        ]);

        $puzzlesection = preg_replace("/[^0-9]/", "", $puzzle->pos_code);
        if (!empty($puzzlesection)) {
            $code = (int) $puzzlesection;
            $completions = count(PuzzleCompletion::where('puzzle', 'LIKE', '%' . $code . '%')->get());
            $bonus = ($completions > 0) ? BonusScore::find($completions) : null;
        }

        $newScore = $team->score + $puzzle->score_won + (($bonus !== null) ? $bonus->$code : 0);

        $team->update([
            'score'=> $newScore,
            'progress'=> $puzzle->code_won,
            'progress_story'=>$progress_story
        ]);

        broadcast(new Won($team->user_id, $pos))->toOthers();
        $this->dispatch('refresh-table', $team->id);
    }

    public function puzzleMid(Team $team){
        $puzzle = Puzzle::where('id',$this->puzzleId)->first();

        $pos = $puzzle->id;

        $progress_story = $puzzle->pos_code."MID";

        PuzzleCompletion::create([
            'team_id'=> $team->id,
            'puzzle'=> $puzzle->pos_code
        ]);

        $puzzlesection = preg_replace("/[^0-9]/", "", $puzzle->pos_code);
        if (!empty($puzzlesection)) {
            $code = (int) $puzzlesection;
            $completions = count(PuzzleCompletion::where('puzzle', 'LIKE', '%' . $code . '%')->get());
            $bonus = ($completions > 0) ? BonusScore::find($completions) : null;
        }

        $newScore = $team->score + $puzzle->score_mid + (($bonus !== null) ? $bonus->$code : 0);

        $team->update([
            'score'=> $newScore,
            'progress'=> $puzzle->code_mid,
            'progress_story'=>$progress_story
        ]);

        broadcast(new Mid($team->user_id, $pos))->toOthers();
        $this->dispatch('refresh-table', $team->id);
    }

    public function forfit(Team $team){
        $puzzle = Puzzle::where('id',$this->puzzleId)->first();

        $pos = $puzzle->id;

        broadcast(new Forfit($team->user_id, $pos))->toOthers();
        $this->dispatch('refresh-table', $team->id);
    }
}
