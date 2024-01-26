<div class="row">
    @foreach ($items as $item)
    <livewire:inventory-item :$item :key="$item->id">
    @endforeach
</div>
