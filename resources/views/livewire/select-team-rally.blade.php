<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    @foreach ($teams as $team)
    @livewire('StartGame',['pos'=> $pos, 'user'=> $team->user, 'team'=> $team], key($team->id))
    @endforeach
</div>
