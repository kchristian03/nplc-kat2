<?php

namespace App\Http\Controllers;

use App\Events\Won;
use App\Models\Pos;
use App\Events\Lost;
use App\Models\Team;
use App\Models\User;
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
        return view('lo.posdetail',[
            'pos'=>$pos,
            'players'=>User::where('role','player')->get()
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
        broadcast(new StartPuzzle($pos, $player))->toOthers();
        return view('lo.puzzle',[
            'pos'=> $pos,
            'player'=> $player
        ]);
    }

    public function startTimer(Request $request){
        broadcast(new StartTimer($request->userId))->toOthers();
        return response()->json(['message' => 'Timer started successfully']);;
    }

    public function posWon(Request $request){
        broadcast(new Won($request->userId, $request->pos))->toOthers();
        return response()->json(['message' => 'Game won successfully']);;
    }

    public function posLost(Request $request){
        broadcast(new Lost($request->userId, $request->pos))->toOthers();
        return response()->json(['message' => 'Game lost successfully']);;
    }
}
