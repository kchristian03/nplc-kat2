@extends('player.layouts.app')

@section('title', "Rally")

@section('script')
<script>
</script>
@endsection

@section('content')
<h2>Youre Playing Rally Game</h2>
<button id="btn-inventory" class="btn btn-primary" data-toggle="modal" data-target="#inventoryModal">Inventory</button>
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
                @livewire('InventoryModal')
            </div>
        </div>
    </div>
</div>
@endsection

@section('footscript')
<script>

setTimeout(() => {
    window.Echo.private('PosWon.user.{{ Auth::id() }}')
    .listen('.pos_won', (e) => {
       console.log(e)
       const won = e.won
       if (won) {
            window.location.href = "/";
        } else {
            // Handle invalid data, e.g., log an error or display a message
            console.error('Invalid data received:', incomingData);
        }
    })
    }, 200);

    setTimeout(() => {
    window.Echo.private('PosLost.user.{{ Auth::id() }}')
    .listen('.pos_lost', (e) => {
       console.log(e)
       const lost = e.lost
       if (lost) {
            window.location.href = "/";
        } else {
            // Handle invalid data, e.g., log an error or display a message
            console.error('Invalid data received:', incomingData);
        }
    })
    }, 200);



</script>
@endsection

