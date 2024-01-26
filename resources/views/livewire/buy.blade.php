<div>
    <button wire:click="buy" class="btn btn-primary"
    {{ auth()->user()->team->coin < $price ? 'disabled' : '' }}
    >Buy</button>
</div>
