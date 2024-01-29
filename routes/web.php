<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LOController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PuzzleController;
use App\Http\Controllers\TeamItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// tests
// Route::view('/trial','websocketTest');
// Route::view('/intro','player.intro1');
// Route::get('/test',[TeamController::class,'test']);
// Route::get('/private',[TeamController::class,'private']);

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware'=> 'role:lo' ],function(){
    Route::get('/pos',[LOController::class,'index'])->name('pos');
    Route::get('/pos/{pos}',[PosController::class,'show'])->name('pos-detail');
    Route::post('/pos/{pos}',[PosController::class,'play'])->name('pos-play');
    Route::post('/start-timer', [PuzzleController::class,'startTimer'])->name('start-timer');
    Route::post('/pos-won', [PosController::class,'posWon'])->name('pos-won');
    Route::post('/pos-lost', [PosController::class,'posLost'])->name('pos-lost');
    Route::get('/story/{puzzle}',[PuzzleController::class,'show'])->name('puzzle-detail');
    Route::get('/story/{puzzle}/{player}',[PuzzleController::class,'play'])->name('puzzle-play');
    Route::post('/puzzle-won', [PuzzleController::class,'puzzleWon'])->name('puzzle-won');
    Route::post('/puzzle-lost', [PuzzleController::class,'puzzleLost'])->name('puzzle-lost');
    Route::get('/gamestart',[LOController::class,'globalTimer']);
    Route::get('/gamestop',[LOController::class,'globalTimerStop']);
});

Route::group(['middleware'=> 'role:admin' ],function(){

});

Route::group(['middleware'=> 'role:player'],function(){
    Route::get('/puzzle/{puzzle}',[PlayerController::class,'puzzle']);
    Route::get('/rally/{pos}',[PlayerController::class,'rally']);
    Route::get('/play',[PlayerController::class,'index']);

});

Route::post('/buy-item',[TeamItemController::class,'buyItem']);
