<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LOController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

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

Route::get('/', function () {
    return view('player.index');
});

Route::get('/test',[TeamController::class,'test']);
Route::get('/private',[TeamController::class,'private']);


Route::view('/trial','websocketTest');

Route::view('/intro','player.intro1');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/play',[PlayerController::class,'index']);
    Route::get('/pos',[LOController::class,'index']);
    Route::get('/pos/{pos}',[PosController::class,'show']);
    Route::get('/pos/{pos}/{player}',[PosController::class,'play']);

    Route::get('/puzzle/{pos}',[PlayerController::class,'puzzle']);

    Route::post('/start-timer', [PosController::class,'startTimer'])->name('start-timer');
    Route::post('/pos-won', [PosController::class,'posWon'])->name('pos-won');
    Route::post('/pos-lost', [PosController::class,'posLost'])->name('pos-lost');
});
