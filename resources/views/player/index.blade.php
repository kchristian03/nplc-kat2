@extends('player.layouts.app')

@section('title',"Dashboard")

@section('script')
<script>
</script>
@endsection

@section('content')

<div class="container-fluid">
    @if(auth()->user()->team->progress != 1)
    <button id="btn-story" class="btn btn-primary" data-toggle="modal" data-target="#storyModal">Story</button>
    @endif

    <button id="btn-inventory" class="btn btn-primary" data-toggle="modal" data-target="#inventoryModal">Inventory</button>
    <button id="btn-shop" class="btn btn-primary" data-toggle="modal" data-target="#shopModal">Shop</button>
</div>

{{-- @include('player.stories.puzzle-1.intro.puzzle1intro') --}}

@include('player.inventory')
@include('player.shop')

<div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="Story" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Story</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(auth()->user()->team->progress != 1)
                @include('story.'.auth()->user()->team->progress_story)
                @endif
            </div>
        </div>
        {{-- <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div> --}}
    </div>
</div>



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
