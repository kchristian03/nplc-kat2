<?php

namespace App\Http\Controllers;

use App\Events\Won;
use App\Events\Lost;
use App\Models\Team;
use App\Models\User;
use App\Models\Puzzle;
use App\Events\StartTimer;
use App\Events\StartPuzzle;
use Illuminate\Http\Request;
use App\Http\Requests\StorePuzzleRequest;
use App\Http\Requests\UpdatePuzzleRequest;

class PuzzleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePuzzleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Puzzle $puzzle)
    {
        return view('lo.puzzledetail',[
            'puzzle'=>$puzzle,
            'teams'=>Team::where('progress',$puzzle->pos_code)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puzzle $puzzle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePuzzleRequest $request, Puzzle $puzzle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puzzle $puzzle)
    {
        //
    }

    public function startTimer(Request $request){
        broadcast(new StartTimer($request->userId))->toOthers();
        return response()->json(['message' => 'Timer started successfully']);;
    }

    public function play(Puzzle $puzzle, User $player)
    {

        if($player->team->coin >= $puzzle->entry_coin && $player->team->exp >= $puzzle->entry_exp){

            broadcast(new StartPuzzle($puzzle, $player))->toOthers();
            return view('lo.puzzle',[
                'puzzle'=> $puzzle,
                'player'=> $player
            ]);
        }

    }

    public function puzzleWon(Request $request){
        $puzzle = Puzzle::where('id',$request->puzzle)->first();
        $team = Team::where('user_id',$request->userId)->first();

        $pos = $request->puzzle;

        $newCoin = $team->coin - $puzzle->entry_coin;
        $newScore = $team->score + $puzzle->score_won;

        $team->update([
            'score'=> $newScore,
            'progress'=> $puzzle->code_won,
            'coin'=>$newCoin
        ]);

        if($puzzle->item)

        broadcast(new Won($request->userId, $pos))->toOthers();
        return response()->json(['message' => 'Puzzle won successfully']);
    }

    public function puzzleLost(Request $request){

        $puzzle = Puzzle::where('id',$request->puzzle)->first();
        $team = Team::where('user_id',$request->userId)->first();

        $pos = $request->puzzle;

        $newScore = $team->score + $puzzle->score_lost;
        $newCoin = $team->coin - $puzzle->entry_coin;

        $team->update([
            'score'=> $newScore,
            'progress'=> $puzzle->code_lost,
            'coin'=>$newCoin
        ]);

        broadcast(new Lost($request->userId, $pos))->toOthers();
        return response()->json(['message' => 'Puzzle lost successfully']);
    }
}


