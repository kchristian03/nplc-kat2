<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\Team;
use App\Models\Puzzle;
use App\Models\GlobalTimer;
use Illuminate\Http\Request;

class LOController extends Controller
{
    public function index(){
        return view('lo.index',[
            'pos'=>Pos::all(),
            'puzzle'=>Puzzle::all(),
            'teams'=>Team::all()
        ]);
    }

    public function globalTimer(){

        $globalTimer = GlobalTimer::orderBy('id', 'desc')->first();


        if (empty($globalTimer)) {
            return view('lo.gamestart');
        }else{
            return redirect('/');
        }

    }

    public function globalTimerStop(){

        $globalTimer = GlobalTimer::orderBy('id', 'desc')->first();


        if (!empty($globalTimer)) {
            return view('lo.gamestop');
        }else{
            return redirect('/');
        }

    }
}
