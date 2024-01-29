<div>
    <button wire:click="buy" class="btn btn-primary" data-dismiss="modal"
    {{ auth()->user()->team->coin < $price ? 'disabled' : '' }}
    >Buy</button>
</div>
