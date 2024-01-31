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
            {{ Log::info('saat display') }}
            {{ Log::info($playingteams) }}
            @if (!empty($playingteams))
                @foreach ($playingteams as $playingteam)
                    {{ Log::info('Playing team: ' . $playingteam) }}
                    <tr>
                        <td>{{ $playingteam->team->id }}</td>
                        <td>{{ $playingteam->team->name }}</td>
                        <td>
                            @if ($playingteam->duration == null)
                                {{ $playingteam->puzzle->time }} Min
                            @else
                                <div id="timer{{ $playingteam->team->id }}">{{ $playingteam->duration }}</div>
                            @endif

                        </td>
                        <td>
                            <button wire:click="startPuzzle({{ $playingteam->team }})"
                                id="timerbtn{{ $playingteam->team->id }}"
                                {{ $playingteam->duration == null ? '' : 'disabled' }}
                                class="btn btn-primary">Start</button>

                            <script>
                                setTimeout(() => {
                                    var teamId = "{{ $playingteam->team->id }}"
                                    var time{{ $playingteam->team->id }} = "{{ $playingteam->duration }}";
                                    if (time{{ $playingteam->team->id }} != "") {
                                        startCountdown(time{{ $playingteam->team->id }}, "timer" + teamId);
                                    }
                                }, 200);
                            </script>
                            <button wire:click="wonPuzzle({{ $playingteam->team }})"
                                id="wonbtn{{ $playingteam->team->id }}"
                                {{ $playingteam->duration == null ? 'disabled' : '' }}
                                class="btn btn-success">Won</button>
                            @if ($playingteam->puzzle->score_mid != 0)
                                <button wire:click="puzzleMid({{ $playingteam->team }})"
                                    id="midbtn{{ $playingteam->team->id }}"
                                    {{ $playingteam->duration == null ? 'disabled' : '' }}
                                    class="btn btn-success">Mid</button>
                            @endif

                            <button wire:click="lostPuzzle({{ $playingteam->team }})"
                                id="lostbtn{{ $playingteam->team->id }}"
                                {{ $playingteam->duration == null ? 'disabled' : '' }}
                                class="btn btn-danger">Lost</button>

                            @if ($playingteam->puzzle->forfitable != 0)
                                <button wire:click="forfit({{ $playingteam->team }})"
                                    id="forfitbtn{{ $playingteam->team->id }}"
                                    {{ $playingteam->duration == null ? 'disabled' : '' }}
                                    class="btn btn-danger">Forfit</button>
                            @endif
                        </td>
                    </tr>

                    <script>
                        setTimeout(() => {
                            window.Echo.private('SpecialItem.user.{{ $playingteam->team->user_id }}')
                                .listen('.special-item', (event) => {
                                    console.log('Special Item Received:', event.message);
                                    createAlert(event.message);
                                });
                        }, 200);
                    </script>
                @endforeach
            @endif
        </tbody>
    </table>


</div>
