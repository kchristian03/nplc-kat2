<div wire:poll class="container mt-5" >
    <h2>Leaderboard</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Team Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $index=> $team)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
