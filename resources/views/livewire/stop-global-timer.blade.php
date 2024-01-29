<div>
    <button wire:click="stop" class="btn btn-danger"
    {{ strtotime($globaltimer->game_duration) <= strtotime(now())  ? '' : 'disabled' }}
    >Stop Game</button>
</div>
