<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        return view('player.index');
    }

    public function puzzle(Pos $pos){
        return view('player.puzzle',[
            'pos'=>$pos
        ]);
    }

    public function rallyGame(Pos $pos){
        return view('player.rallygame',[
            'pos'=>$pos
        ]);
    }
}
