<div class="row">
    @foreach ($items as $teamItem)
    @livewire('inventory-item', ['teamItem' => $teamItem], key($teamItem->id))
    @endforeach
</div>
