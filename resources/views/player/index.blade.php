@extends('player.layouts.app')

@section('title', 'Dashboard')

@section('script')
    <script>
        function startCountdown(expirationTime, countdownElementId) {
            var countdownInterval = setInterval(function() {
                var nowMillis = new Date().getTime();
                var targetTime = new Date(expirationTime).getTime();

                var distance = targetTime - nowMillis;

                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                var minutesFormatted = ('0' + minutes).slice(-2);
                var secondsFormatted = ('0' + seconds).slice(-2);

                if (countdownElementId == "globalTimer") {
                    document.getElementById(countdownElementId).innerHTML = "Game Ends in " + minutesFormatted +
                        ":" + secondsFormatted;
                } else {
                    document.getElementById(countdownElementId).innerHTML = "2x " + countdownElementId +
                        " Bonus: " + minutes + "m " + seconds + "s";
                }

                if (distance <= 0) {
                    clearInterval(countdownInterval);
                    // document.getElementById(countdownElementId).innerHTML = currentTimeFormatted + " target time" + targetTimeFormatted;
                    document.getElementById(countdownElementId).innerHTML = ""
                }
            }, 1000);
        }
    </script>
@endsection

@section('content')

    <div class="bg-cover bg-fixed h-screen w-screen" style="background-image: url('{{ asset('images/nplcbg.png') }}')">
        <div class="bg-cover bg-bottom bg-fixed bg-no-repeat h-screen w-screen "
            style="background-image: url('{{ asset('images/bottommoon.png') }}')">
            <div class="backdrop-blur-[1px] h-screen w-screen bg-white/20">

                @if (empty($gameDuration))

                    <h1>Starting Soon</h1>
                @elseif(!empty($gameDuration) && $gameDuration->game_duration <= now())
                    <h1>Game Ends</h1>
                    <h1 class="h-screen w-screen">Game Ends</h1>
                @else
                    <div class="container-fluid">
                        @if (auth()->user()->team->progress != 1)
                            <button id="btn-story" class="btn btn-primary" data-toggle="modal" data-target="#">Story</button>
                        @endif

                        <button id="btn-inventory" class="btn btn-primary" data-toggle="modal"
                            data-target="#inventoryModal">Inventory</button>
                        <button id="btn-shop" class="btn btn-primary" data-toggle="modal"
                            data-target="#shopModal">Shop</button>
                    </div>

                    @livewire('PlayerStats', ['teamId' => auth()->user()->team->id])
                    <div id="globalTimer"></div>


                    <script>
                        function hideLeaderboard() {
                            document.getElementById('leaderboard').style.display = 'none';
                        }

                        let started = "{{ $gameDuration }}";
                        let globalTimer = "{{ $gameDuration->game_duration }}"
                        console.log(globalTimer);
                        startCountdown(globalTimer, "globalTimer");
                    </script>


                    <div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="Inventory"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Inventory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @livewire('InventoryModal')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="Shop"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Shop</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @livewire('ShopModal')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="Story"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Story</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if (auth()->user()->team->progress != 1)
                                        @include('story.' . auth()->user()->team->progress_story)
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="leaderboard">
                        @livewire('Leaderboard')
                    </div>


                @endif
            </div>
        </div>
    </div>

@endsection

@section('footscript')
    <script>
        setTimeout(() => {
            window.Echo.private('StartPuzzle.user.{{ Auth::id() }}')
                .listen('.start_puzzle', (e) => {
                    console.log(e)

                    const puzzle_id = e.puzzleId
                    if (puzzle_id != null) { // Replace with your validation logic
                        window.location.href = "/puzzle/" + puzzle_id;
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
                        window.location.href = "/rally/" + rally_id;
                    } else {
                        // Handle invalid data, e.g., log an error or display a message
                        console.error('Invalid data received:', incomingData);
                    }
                })
        }, 200);

        setTimeout(() => {
            window.Echo.channel('globaltimer')
                .listen('.global-timer', (event) => {
                    console.log(event);
                    const message = event.message;

                    // Check the message content and take appropriate actions
                    if (message === 'GameStart') {
                        window.location.href = "/";
                    } else {
                        // Handle other cases if needed
                        console.log('Received message:', message);
                    }
                });
        }, 200);

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
