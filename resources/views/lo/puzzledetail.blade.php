@extends('lo.layouts.app')

@section('title', 'Puzzle ' . $puzzle->pos_code)

@section('script')
    <script>
        function startCountdown(expirationTime, countdownElementId) {
        var countdownInterval = setInterval(function () {
        var nowMillis = new Date().getTime();
        var targetTime = new Date(expirationTime).getTime();

        var distance = targetTime - nowMillis;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var currentTimeFormatted = new Date(nowMillis).toLocaleString();
        var targetTimeFormatted = new Date(targetTime).toLocaleString();

        document.getElementById(countdownElementId).innerHTML =minutes + ":" + seconds;

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
    <div class="container-fluid">
        <h1>Team List</h1>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Teams
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($teams as $team)
                    @if ($team->exp < $puzzle->entry_exp || $team->coin < $puzzle->entry_coin)
                        <span class="dropdown-item disabled">{{ $team->name }} Dont Have Enough EXP or COIN</span>
                    @else
                    @livewire('StartPuzzle',['puzzle'=> $puzzle, 'user'=> $team->user, 'team'=> $team], key($team->id))
                    @endif
                @endforeach
            </div>
        </div>

        @livewire('PuzzleTable', ['puzzleId'=> $puzzle->id])
    </div>
@endsection

