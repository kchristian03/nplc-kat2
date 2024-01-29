<div wire:poll>
    <button wire:click="start_puzzle" class="dropdown-item" {{ empty($team->playingPuzzle) ? "" : "disabled" }}  >{{ $team->name }}</button>
</div>
