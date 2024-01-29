@extends('lo.layouts.app')

@section('title', 'Puzzle ' . $puzzle->pos_code)

@section('script')
    <script>
        function startCountdown(expirationTime, countdownElementId) {
            var countdownInterval = setInterval(function() {
                var nowMillis = new Date().getTime();
                var targetTime = new Date(expirationTime).getTime();

                var distance = targetTime - nowMillis;

                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Format minutes and seconds to always display two digits
                var minutesFormatted = ('0' + minutes).slice(-2);
                var secondsFormatted = ('0' + seconds).slice(-2);

                document.getElementById(countdownElementId).innerHTML = minutesFormatted + ":" + secondsFormatted;

                if (distance <= 0) {
                    clearInterval(countdownInterval);
                    document.getElementById(countdownElementId).innerHTML = "Finished";
                }
            }, 1000);
        }


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

    @if (!empty($gameDuration) && $gameDuration->game_duration <= now())
        <h1>Game Ends</h1>
    @else
        <div class="container-fluid">
            <h1>Team List</h1>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Teams
                </button>
                @livewire('SelectTeamPuzzle', ['pos_code' => $puzzle->pos_code, 'puzzle' => $puzzle])
            </div>

            @livewire('PuzzleTable', ['puzzleId' => $puzzle->id])
        </div>
    @endif
@endsection
