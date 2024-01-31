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

        function createAlert(message) {
            var alertContainer = document.getElementById('alert-container');
            var alertElement = document.createElement('div');
            alertElement.className =
                'flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
            alertElement.role = 'alert';
            alertElement.innerHTML = `
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    ${message}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="button" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            `;
            alertContainer.appendChild(alertElement);
        }
    </script>
@endsection


@section('content')

    <div id="alert-container"></div>

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
