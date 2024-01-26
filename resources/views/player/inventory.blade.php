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
                {{-- @dd(auth()->user()->team->item) --}}
                @if (auth()->user()->team->item != [])
                    <livewire:inventory-modal />
                @else
                    <h1>Inventory Empty</h1>
                @endif
            </div>
        </div>
    </div>
</div>
