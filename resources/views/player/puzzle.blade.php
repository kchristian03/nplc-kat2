@extends('player.layouts.app')

@section('title', 'Puzzle')

@section('script')
    <script></script>
@endsection

@section('content')
    <div class="countdown-container">
        <div class="countdown-display">
            <span id="minutes">{{ $puzzle->time }}</span>:<span id="seconds">00</span>
            <button id="btn-inventory" class="btn btn-primary" data-toggle="modal"
                data-target="#inventoryModal">Inventory</button>
                <button id="btn-story" class="btn btn-primary" data-toggle="modal"
                data-target="#storyModal">Story</button>
        </div>
    </div>

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
                    @include('story.'.auth()->user()->team->progress)
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="Inventory" aria-hidden="true">
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

        setTimeout(() => {
            window.Echo.private('StartTimer.user.{{ Auth::id() }}')
                .listen('.start_timer', (e) => {
                    console.log(e);
                    start = e.start;

                    if (start) {
                        const now = new Date();
                        targetDate = new Date(now.getTime() + remainingTime * 1000);
                        startCountdown();
                    }
                });
        }, 500);

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
                    // Add your action here when the countdown is finished
                }
            }, 1000);
        };
    </script>
@endsection
