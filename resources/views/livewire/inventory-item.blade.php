<div class="col-md-6 mb-4">
    <div class="card">
        {{-- Uncomment the following line if you have an image --}}
        {{-- <img class="card-img-top" src="{{ $item->image_path }}" alt="Card image cap"> --}}
        <div class="card-body">
            <h5 class="card-title">{{ $item->name }} - {{ $item->price }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <p>Item ID {{ $item->id }}</p>
            @livewire('use_item', ['team_id' => auth()->user()->team->id, 'item_id' => $item->id])
        </div>
    </div>
</div>