<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\Item;
use App\Models\Puzzle;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        return view('player.index',[
            "items"=>Item::all()
        ]);
    }

    public function puzzle(Puzzle $puzzle){
        return view('player.puzzle',[
            'puzzle'=>$puzzle
        ]);
    }

    public function rally(Pos $pos){
        return view('player.rallygame',[
            'pos'=>$pos
        ]);
    }
}
