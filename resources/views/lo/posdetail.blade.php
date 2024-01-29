@extends('lo.layouts.app')

@section('title','Pos '.$pos->id)


@section('script')
<script>
    setTimeout(() => {
    window.Echo.channel('globaltimerstop')
        .listen('.global-timer-stop', (event) => {
            console.log(event);
            const message = event.message;

            // Check the message content and take appropriate actions
            if (message === 'GameStop') {
                window.location.href = "/";
            } else {
                // Handle other cases if needed
                console.log('Received message:', message);
            }
        });
}, 200);
</script>
@endsection
@section('content')

@if(!empty($gameDuration) && $gameDuration->game_duration<=now())
<h1>Game Ends</h1>
@else
<div class="container-fluid">
    <h1>Team List</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Teams
        </button>
        @livewire('SelectTeamRally', ['pos'=> $pos])
      </div>
      @livewire('TeamTable', ['posId'=> $pos->id])
</div>
@endif
@endsection







