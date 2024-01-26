<div class="container mt-5">
    <h2>Team Information</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Team ID</th>
                <th>Team Name</th>
                <th>Duration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{  Log::info("saat display"); }}
            {{  Log::info($playingteams); }}
            @if(!empty($playingteams))
                @foreach ($playingteams as $playingteam)
                <tr>
                    <td>{{ $playingteam->team->id }}</td>
                    <td>{{ $playingteam->team->name}}</td>
                    <td>
                        @if($playingteam->duration == null)
                        {{ $playingteam->puzzle->time }} Min
                        @else
                        <div id="timer{{ $playingteam->team->id }}"></div>
                        <script>
                            var teamId = "{{ $playingteam->team->id }}"
                            var time{{ $playingteam->team->id  }} = "{{ $playingteam->duration }}";
                            startCountdown(time{{ $playingteam->team->id }}, "timer"+teamId);
                        </script>
                        @endif

                    </td>
                    <td>
                        <button wire:click="startPuzzle({{ $playingteam->team }})" id="timerbtn{{ $playingteam->team->id  }}" {{ $playingteam->duration == null? "": "disabled" }} class="btn btn-primary">Start</button>
                        <button wire:click="wonPuzzle({{ $playingteam->team }})" id="wonbtn{{ $playingteam->team->id  }}"  {{ $playingteam->duration == null? "disabled": "" }} class="btn btn-success">Won</button>
                        @if($playingteam->puzzle->score_mid != 0)
                        <button wire:click="midPuzzle({{ $playingteam->team }})" id="midbtn{{ $playingteam->team->id  }}" {{ $playingteam->duration == null? "disabled": "" }} class="btn btn-success">Mid</button>
                        @endif
                        <button wire:click="lostPuzzle({{ $playingteam->team }})" id="lostbtn{{ $playingteam->team->id  }}" {{ $playingteam->duration == null? "disabled": "" }} class="btn btn-danger">Lost</button>
                    </td>
                </tr>
                @endforeach
            @endif
            {{-- @dd($playingteams1) --}}
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
