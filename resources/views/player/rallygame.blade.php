@extends('player.layouts.app')

@section('title', "Rally")

@section('script')
<script>
</script>
@endsection

@section('content')
<h2>Youre Playing Rally Game</h2>
<button id="btn-inventory" class="btn btn-primary" data-toggle="modal" data-target="#inventoryModal">Inventory</button>
@include('player.inventory')
@endsection

@section('footscript')
@vite('resources/js/app.js')
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

