<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('myPrivateChannel.user.{id}', function($user,$id){
return $user->id == $id;
});

Broadcast::channel('StartPuzzle.user.{userId}', function ($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('StartRally.user.{userId}', function ($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('StartTimer.user.{userId}', function($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('PosWon.user.{userId}', function($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('PosLost.user.{userId}', function($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('PosMid.user.{userId}', function($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('Forfit.user.{userId}', function($user,$userId){
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('SpecialItem.user.{userId}', function ($user, $userId) {
    return true;
});

Broadcast::channel('globaltimer', function () {
    return true;
});

Broadcast::channel('globaltimerstop', function () {
    return true;
});
