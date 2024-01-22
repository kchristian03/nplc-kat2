<?php

namespace App\Http\Controllers;

use App\Events\Won;
use App\Models\Pos;
use App\Events\Lost;
use App\Models\Team;
use App\Models\User;
use App\Models\Item;
use App\Models\TeamItem;
use App\Models\Result;
use App\Events\StartRally;
use App\Events\StartTimer;
use App\Events\StartPuzzle;
use Illuminate\Http\Request;
use App\Http\Requests\StorePosRequest;
use App\Http\Requests\UpdatePosRequest;

class PosController extends Controller
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
    public function store(StorePosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pos $pos)
    {
        return view('lo.posdetail', [
            'pos' => $pos,
            'teams' => Team::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pos $pos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePosRequest $request, Pos $pos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pos $pos)
    {
        //
    }

    public function play(Pos $pos, User $player)
    {
        broadcast(new StartRally($pos, $player))->toOthers();
        return view('lo.rally', [
            'pos' => $pos,
            'player' => $player
        ]);
    }


    public function posWon(Request $request)
    {
        $pos = Pos::where('id', $request->pos)->first();
        $team = Team::where('user_id', $request->userId)->first();

        $newScore = $team->score + $pos->score_won;
        $newCoin = $team->coin + $pos->coin_won;
        $newExp = $team->exp + $pos->exp_won;

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

        broadcast(new Won($request->userId, $request->pos))->toOthers();
        return response()->json(['message' => 'Rally won successful '.$random]);
    }

    public function posLost(Request $request)
    {
        $pos = Pos::where('id', $request->pos)->first();
        $team = Team::where('user_id', $request->userId)->first();

        $newScore = $team->score + $pos->score_lost;
        $newCoin = $team->coin + $pos->coin_lost;
        $newExp = $team->exp + $pos->exp_lost;

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

        broadcast(new Lost($request->userId, $request->pos))->toOthers();
        return response()->json(['message' => 'Rally lost successful']);
    }
}
