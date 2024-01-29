<div wire:poll>
    <button wire:click="start_game" class="dropdown-item" {{ empty($team->playingRally) ? "" : "disabled" }} >{{ $team->name }}</button>
</div>
