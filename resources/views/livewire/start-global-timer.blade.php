<div>
    <button wire:click="start" class="btn btn-danger"
    {{ empty($globaltimer) ? '' : 'disabled' }}
    >Start Game</button>

    <script>
        console.log('{{ $globaltimer }}');
    </script>
</div>
