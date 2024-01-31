@extends('player.layouts.app')

@section('title', 'Puzzle')


@section('content')

    <div class="bg-cover bg-fixed h-screen w-screen" style="background-image: url('{{ asset('images/nplcbg.png') }}')">
        <div class="bg-cover bg-bottom bg-fixed bg-no-repeat h-screen w-screen "
            style="background-image: url('{{ asset('images/bottommoon.png') }}')">
            <div class="backdrop-blur-[1px] h-screen w-screen bg-white/20">

                <div class="h-screen w-screen flex flex-col gap-6 justify-center items-center">
                    <div class="card p-2 bg-gradient-to-br from-gray-600 to-gray-500 rounded drop-shadow-md">
                        <div class="card p-5 bg-sky-500/90 rounded drop-shadow-md">
                            <h1 class="font-sans font-bold text-4xl text-slate-100 text-center drop-shadow-md">Puzzle</h1>
                        </div>
                    </div>

                    <div class="countdown-container">
                        <div
                            class="countdown-display text-slate-100 font-semibold text-xl bg-red-500/90 rounded p-2 text-center">
                            <span id="minutes">{{ $puzzle->time }}</span>:<span id="seconds">00</span>
                        </div>

                    </div>

                    <div class="flex gap-2">
                    <button data-modal-target="story-modal" data-modal-toggle="story-modal"
                        class="block text-slate-100 bg-sky-800/90 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-800 font-bold rounded text-md px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Story
                    </button>


                        @foreach (auth()->user()->team->item as $item)
                            @if ($item->code == 'HINT')
                                @livewire('use_hint', ['team_id' => auth()->user()->team->id, 'item_id' => $item->id])
                            @break
                        @endif
                    @endforeach
                </div>
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
                <!-- Modal body -->
                <div>
                    @include('story.' . auth()->user()->team->progress)
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footscript')
    <script>
        setTimeout(() => {
            window.Echo.private('PosWon.user.{{ Auth::id() }}')
                .listen('.pos_won', (e) => {
                    console.log(e)
                    const won = e.won
                    if (won) {
                        window.location.href = "/";
                    } else {
                        // Handle invalid data, e.g., log an error or display a message
                        console.error('Invalid data received:', incomingData);
                    }
                })
        }, 200);

        setTimeout(() => {
            window.Echo.private('PosLost.user.{{ Auth::id() }}')
                .listen('.pos_lost', (e) => {
                    console.log(e)
                    const lost = e.lost
                    if (lost) {
                        window.location.href = "/";
                    } else {
                        // Handle invalid data, e.g., log an error or display a message
                        console.error('Invalid data received:', incomingData);
                    }
                })
        }, 200);

        setTimeout(() => {
            window.Echo.private('PosMid.user.{{ Auth::id() }}')
                .listen('.pos_mid', (e) => {
                    console.log(e)
                    const mid = e.mid
                    if (mid) {
                        window.location.href = "/";
                    } else {
                        // Handle invalid data, e.g., log an error or display a message
                        console.error('Invalid data received:', incomingData);
                    }
                })
        }, 200);

        setTimeout(() => {
            window.Echo.private('Forfit.user.{{ Auth::id() }}')
                .listen('.forfit', (e) => {
                    console.log(e)
                    const forfit = e.forfit
                    if (forfit) {
                        window.location.href = "/";
                    } else {
                        // Handle invalid data, e.g., log an error or display a message
                        console.error('Invalid data received:', incomingData);
                    }
                })
        }, 200);

        let start = false;
        let initialTime = {{ $puzzle->time }};
        let remainingTime = initialTime * 60; // Convert minutes to seconds
        let targetDate;

        // Load saved data from localStorage
        const savedStartTime = localStorage.getItem('startTime');
        const savedRemainingTime = localStorage.getItem('remainingTime');

        const startCountdown = () => {
            const minutesElement = document.getElementById('minutes');
            const secondsElement = document.getElementById('seconds');
            let intervalId;

            intervalId = setInterval(() => {
                const now = new Date();
                const difference = targetDate - now;
                const minutes = Math.floor(difference / (1000 * 60));
                const seconds = Math.floor((difference / 1000) % 60);

                minutesElement.textContent = minutes.toString().padStart(2, '0');
                secondsElement.textContent = seconds.toString().padStart(2, '0');

                if (difference <= 0) {
                    clearInterval(intervalId);
                    minutesElement.textContent = '00';
                    secondsElement.textContent = '00';

                    // Remove saved data from localStorage when the countdown is finished
                    localStorage.removeItem('startTime');
                    localStorage.removeItem('remainingTime');

                    // Add your action here when the countdown is finished
                }
            }, 1000);
        };

        if (savedStartTime && savedRemainingTime) {
            const now = new Date();
            const savedTargetDate = new Date(parseInt(savedStartTime) + parseInt(savedRemainingTime) * 1000);

            if (savedTargetDate > now) {
                start = true;
                targetDate = savedTargetDate;
                startCountdown();
            }
        }

        setTimeout(() => {
            window.Echo.private('StartTimer.user.{{ Auth::id() }}')
                .listen('.start_timer', (e) => {
                    console.log(e);
                    start = e.start;

                    if (start) {
                        const now = new Date();
                        targetDate = new Date(now.getTime() + remainingTime * 1000);

                        // Save start time and remaining time in localStorage
                        localStorage.setItem('startTime', now.getTime().toString());
                        localStorage.setItem('remainingTime', remainingTime.toString());

                        startCountdown();
                    }
                });
        }, 500);
    </script>
@endsection
