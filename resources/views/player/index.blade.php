@extends('player.layouts.app')

@section('title',"Dashboard")

@section('content')

<div class="container-fluid">
    @if(auth()->user()->team->progress != 1)
    <button id="btn-story" class="btn btn-primary" data-toggle="modal" data-target="#">Story</button>
    @endif

    <button id="btn-inventory" class="btn btn-primary" data-toggle="modal" data-target="#inventoryModal">Inventory</button>
    <button id="btn-shop" class="btn btn-primary" data-toggle="modal" data-target="#shopModal">Shop</button>
</div>

<div id="EXP"></div>
<div id="COIN"></div>

{{-- <p>now: {{ now() }}</p>
<p>coin: {{ Session::get("COIN") }}</p>
<p>exp: {{ Session::get("EXP") }}</p> --}}

{{-- @include('player.stories.puzzle-1.intro.puzzle1intro') --}}

@include('player.inventory')
@include('player.shop')
{{ Log::info(session()->all()) }}

<div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="Story" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Story</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(auth()->user()->team->progress != 1)
                @include('story.'.auth()->user()->team->progress_story)
                @endif
            </div>
        </div>
        {{-- <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div> --}}
    </div>
</div>



@section('footscript')
@vite('resources/js/app.js')
<script>
    setTimeout(() => {
    window.Echo.private('StartPuzzle.user.{{ Auth::id() }}')
    .listen('.start_puzzle', (e) => {
       console.log(e)

       const puzzle_id = e.puzzleId
       if (puzzle_id != null) { // Replace with your validation logic
            window.location.href = "/puzzle/"+puzzle_id;
        } else {
            // Handle invalid data, e.g., log an error or display a message
            console.error('Invalid data received:', incomingData);
        }
    })
    }, 200);

    setTimeout(() => {
    window.Echo.private('StartRally.user.{{ Auth::id() }}')
    .listen('.start_rally', (e) => {
       console.log(e)

       const rally_id = e.posId
       if (rally_id != null) { // Replace with your validation logic
            window.location.href = "/rally/"+rally_id;
        } else {
            // Handle invalid data, e.g., log an error or display a message
            console.error('Invalid data received:', incomingData);
        }
    })
    }, 200);



    function startCountdown(expirationTime, countdownElementId) {
        var countdownInterval = setInterval(function () {
        var nowMillis = new Date().getTime();
        var targetTime = new Date(expirationTime).getTime();

        var distance = targetTime - nowMillis;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var currentTimeFormatted = new Date(nowMillis).toLocaleString();
        var targetTimeFormatted = new Date(targetTime).toLocaleString();

        document.getElementById(countdownElementId).innerHTML = "2x " + countdownElementId + " Bonus: " + minutes + "m " + seconds + "s";

        if (distance <= 0) {
            clearInterval(countdownInterval);
            // document.getElementById(countdownElementId).innerHTML = currentTimeFormatted + " target time" + targetTimeFormatted;
            document.getElementById(countdownElementId).innerHTML = ""
        }
    }, 1000);
    }

    var coinTime = "{{ Session::get('COIN') }}";
    if(coinTime != ''){
        startCountdown(coinTime, "COIN");
    }


    var expTime = "{{ Session::get('EXP') }}";
    if(expTime != ''){
        startCountdown(expTime, "EXP");
    }



</script>

@endsection

@endsection
