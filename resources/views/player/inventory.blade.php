

  <!-- Modal -->
  <div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="Inventory" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Inventory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                {{-- @dd(auth()->user()->team->item) --}}
                @if(auth()->user()->team->item != [])
                    @foreach (auth()->user()->team->item as $item)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                {{-- <img class="card-img-top" src="{{ $item->image_path }}" alt="Card image cap"> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <a href="#" class="btn btn-primary">Use</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <h1>Inventory Empty</h1>
                @endif
            </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
