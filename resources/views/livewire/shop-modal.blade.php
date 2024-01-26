
                <div class="row">
                    @foreach ($items as $item)
                    <livewire:shop-item :$item :key="$item->id">
                    @endforeach
                </div>
