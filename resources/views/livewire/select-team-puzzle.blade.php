<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    @foreach ($teams as $team)
    {{ Log::info("Select team: ".$team); }}
        @if ($team->exp < $puzzle->entry_exp || $team->coin < $puzzle->entry_coin)
            <span class="dropdown-item disabled">{{ $team->name }} Dont Have Enough EXP or COIN</span>
        @else
        @livewire('StartPuzzle',['puzzle'=> $puzzle, 'user'=> $team->user, 'team'=> $team], key($team->id))
        @endif
    @endforeach
</div>
