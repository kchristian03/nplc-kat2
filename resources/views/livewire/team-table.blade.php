<div class="container mt-5">
    <h2>Team Information</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Team ID</th>
                <th>Team Name</th>
                <th>Coin</th>
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
                    <td>{{ $playingteam->team->coin }}</td>
                    <td>
                        <button wire:click="wonGame({{ $playingteam->team }})" class="btn btn-success">Won</button>
                        <button wire:click="lostGame({{ $playingteam->team }})" class="btn btn-danger">Lost</button>
                    </td>
                </tr>
                @endforeach
            @endif


            {{-- @dd($playingteams1) --}}
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
