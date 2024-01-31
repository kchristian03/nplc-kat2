@extends('player.layouts.app')

@section('title', 'Dashboard')

@section('script')
    <script>
        function startCountdown(expirationTime, countdownElementId) {
            var countdownInterval = setInterval(function() {
                var nowMillis = new Date().getTime();
                var targetTime = new Date(expirationTime).getTime();

                var distance = targetTime - nowMillis;

                var hours = Math.floor(distance / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                var hoursFormatted = ('0' + hours).slice(-2);
                var minutesFormatted = ('0' + minutes).slice(-2);
                var secondsFormatted = ('0' + seconds).slice(-2);

                if (countdownElementId == "globalTimer") {
                    document.getElementById(countdownElementId).innerHTML = "Game Ends in " + hoursFormatted +":"+ minutesFormatted +
                        ":" + secondsFormatted;
                } else {
                    document.getElementById(countdownElementId).innerHTML =
                        "<div class=' text-slate-100 font-semibold text-sm bg-sky-700/90 rounded p-2 text-center'>" +
                        countdownElementId + " 2X <br/>" + minutes + "m " + seconds + "s </div>";
                }

                if (distance <= 0) {
                    clearInterval(countdownInterval);
                    // document.getElementById(countdownElementId).innerHTML = currentTimeFormatted + " target time" + targetTimeFormatted;
                    document.getElementById(countdownElementId).innerHTML = ""

                    if (countdownElementId == "globalTimer") {
                        window.location.href = "/";
                    }
                }
            }, 1000);
        }
    </script>
@endsection

@section('content')

    <div class="bg-cover bg-fixed h-full w-full" style="background-image: url('{{ asset('images/nplcbg.png') }}')">
        <div class="bg-cover bg-bottom bg-fixed bg-no-repeat h-full w-full "
            style="background-image: url('{{ asset('images/bottommoon.png') }}')">
            <div class="backdrop-blur-[1px] h-full w-full bg-white/20 flex justify-center">

                @if (empty($gameDuration))

                    <div class=" h-screen w-screen flex justify-center items-center">
                        <div class="card p-2 bg-gradient-to-br from-gray-600 to-gray-500 rounded drop-shadow-md">
                            <div class="card p-5 bg-sky-500/90 rounded drop-shadow-md">
                                <h1 class="font-sans font-bold text-5xl text-slate-100 text-center drop-shadow-md">STARTING
                                </h1>
                            </div>
                        </div>

                    </div>
                @elseif(!empty($gameDuration) && $gameDuration->game_duration <= now())
                    <div class="h-screen w-screen flex flex-col justify-center items-center">
                        <div class="card p-2 bg-gradient-to-br from-gray-600 to-gray-500 rounded drop-shadow-md">
                            <div class="card p-5 bg-sky-500/90 rounded drop-shadow-md">
                                <h1 class="font-sans font-bold text-4xl text-slate-100 text-center drop-shadow-md">GAME
                                    ENDED</h1>
                            </div>
                        </div>
                    </div>
                @else
                    <div class=" h-full w-full flex flex-col justify-center">
                        @livewire('PlayerStats', ['teamId' => auth()->user()->team->id])


                        <div class="flex gap-2 mx-16 justify-center">
                            @if (auth()->user()->team->progress != 1)
                                <button data-modal-target="story-modal" data-modal-toggle="story-modal"
                                    class="block text-slate-100 bg-sky-800/90 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-800 font-bold rounded text-md px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Story
                                </button>
                            @endif


                            <button data-modal-target="inventory-modal" data-modal-toggle="inventory-modal"
                                class="block text-slate-100 bg-sky-800/90 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-800 font-bold rounded text-md px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Inventory
                            </button>


                            <button data-modal-target="shop-modal" data-modal-toggle="shop-modal"
                                class="block text-slate-100 bg-sky-800/90 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-800 font-bold rounded text-md px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Shop
                            </button>

                        </div>

                        <div class="mx-20 my-10 p-4 bg-red-500/90 rounded shadow dark:bg-sky-500/90">
                            <div id="globalTimer" class="text-md font-bold text-slate-100 text-center"></div>
                        </div>



                        <script>
                            function hideLeaderboard() {
                                document.getElementById('leaderboard').style.display = 'none';
                            }

                            let started = "{{ $gameDuration }}";
                            let globalTimer = "{{ $gameDuration->game_duration }}"
                            console.log(globalTimer);
                            startCountdown(globalTimer, "globalTimer");
                        </script>



                        @livewire('Leaderboard')

                    </div>

                @endif

                <div class="absolute bottom-16 mx-10">
                    <div class="card p-2 bg-gradient-to-br from-gray-100 to-gray-200 rounded drop-shadow-md">
                        <div class="flex ">
                            {{-- <div> <img class="w-full h-12 object-cover rounded-lg"
                                    src="{{ asset('images/uc.png') }}" alt="Logo UC">
                            </div> --}}
                            <div > <img class="w-full h-12 object-cover rounded-lg p-3"
                                    src="{{ asset('images/dicoding.png') }}" alt="Dicoding">
                            </div>
                            <div> <img class="w-full h-12 object-cover rounded-lg p-1"
                                    src="{{ asset('images/cloudraya.png') }}" alt="CloudRaya">
                            </div>
                            <div> <img class="w-full h-12 object-cover rounded-lg p-2"
                                    src="{{ asset('images/poenyanyonyaanina.png') }}" alt="PoenyaNyonyaAnina">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="inventory-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Inventory
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="inventory-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    @livewire('InventoryModal')
                </div>
            </div>
        </div>
    </div>



    <div id="shop-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Shop
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="shop-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    @livewire('ShopModal')
                </div>
            </div>
        </div>
    </div>

    <div id="story-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full max-h-full">
        <div class="relative w-full max-w-2xl h-screen max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="px-5 flex items-center justify-between p-1 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Story
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="story-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div>
                    @if (auth()->user()->team->progress != 1)
                        @include('story.' . auth()->user()->team->progress_story)
                    @endif
                </div>
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

                    localStorage.removeItem('startTime');
                    localStorage.removeItem('remainingTime');

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

        document.addEventListener('livewire:init', () => {
            Livewire.on('item-used', (event) => {
                window.location.href = "/";
            });
        });
    </script>

@endsection
