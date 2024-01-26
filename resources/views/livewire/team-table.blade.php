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

            @foreach ($playingteams1 as $playingteam1)
            <tr>
                <td>{{ $playingteam1->id }}</td>
                <td>{{ $playingteam1->name}}</td>
                <td>{{ $playingteam1->coin }}</td>
                <td>
                    <button wire:click="wonGame({{ $playingteam1 }})" class="btn btn-success">Won</button>
                    <button wire:click="lostGame({{ $playingteam1 }})" class="btn btn-danger">Lost</button>
                </td>
            </tr>
            @endforeach

            {{-- @dd($playingteams1) --}}
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
