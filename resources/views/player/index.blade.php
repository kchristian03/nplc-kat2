@extends('player.layouts.app')

@section('title',"Dashboard")

@section('script')
<script>
</script>
@endsection

@section('content')

<div class="container-fluid">
    <button id="btn-story" class="btn btn-primary" data-toggle="modal" data-target="#puzzle1intro">Story</button>
    <button id="btn-inventory" class="btn btn-primary" data-toggle="modal" data-target="#inventoryModal">Inventory</button>
    <button id="btn-shop" class="btn btn-primary" data-toggle="modal" data-target="#shopModal">Shop</button>
</div>

{{-- @include('player.stories.puzzle-1.intro.puzzle1intro') --}}

@include('player.inventory')
@include('player.shop')

@section('footscript')
@vite('resources/js/app.js')
<script>
    setTimeout(() => {
    window.Echo.private('StartPuzzle.user.{{ Auth::id() }}')
    .listen('.start_puzzle', (e) => {
       console.log(e)

       const puzzle_id = e.puzzleId
       if (puzzle_id != null) { // Replace with your validation logic
            window.location.href = "/puzzle/"+puzzle_id;
        } else {
            // Handle invalid data, e.g., log an error or display a message
            console.error('Invalid data received:', incomingData);
        }
    })
    }, 200);

    setTimeout(() => {
    window.Echo.private('StartRally.user.{{ Auth::id() }}')
    .listen('.start_rally', (e) => {
       console.log(e)

       const rally_id = e.posId
       if (rally_id != null) { // Replace with your validation logic
            window.location.href = "/rally/"+rally_id;
        } else {
            // Handle invalid data, e.g., log an error or display a message
            console.error('Invalid data received:', incomingData);
        }
    })
    }, 200);


</script>

@endsection

@endsection
