<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\Team;
use Illuminate\Http\Request;

class LOController extends Controller
{
    public function index(){
        return view('lo.index',[
            'pos'=>Pos::all(),
            'teams'=>Team::all()
        ]);
    }
}
