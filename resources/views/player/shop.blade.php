<!-- Modal -->
<div class="modal fade" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="Shop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Shop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                {{-- <img class="card-img-top" src="{{ $item->image_path }}" alt="Card image cap"> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }} - {{ $item->price }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <button id="btn-buy-{{ $item->code }}" class="btn btn-primary" {{ auth()->user()->team->coin < $item->price ? "disabled" : "" }}>Buy</button>
                                </div>
                            </div>
                        </div>

                        <script>
                            const btnBuy{{ $item->code }} = document.getElementById('btn-buy-{{ $item->code }}');

                            btnBuy{{ $item->code }}.addEventListener('click', () => {
                                const teamId = {{ auth()->user()->team->id }}
                                const itemId = {{ $item->id }}
                                const price = {{ $item->price }}
                                const formData = new FormData();
                                formData.append('team_id', teamId);
                                formData.append('item_id', itemId);
                                formData.append('price', price);

                                console.log(formData);

                                fetch('/buy-item', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                'content'),
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        // Handle successful response
                                        console.log(data);
                                    })
                                    .catch(error => {
                                        // Handle errors
                                        console.error(error);
                                    });
                            });
                        </script>
                    @endforeach
                </div>
            </div>
            {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>
