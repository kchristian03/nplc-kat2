@extends('lo.layouts.app')

@section('title','Pos '.$pos->id)

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all buttons with class "dropdown-item"
        var buttons = document.querySelectorAll(".dropdown-item");

        // Add a click event listener to each button
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Extract user ID from the button ID (assuming the ID is in the format "play{userId}")
                var userId = button.id.replace("play", "");

                // Call the startGame function with the extracted user ID
                startGame(userId);
            });
        });
    });

    // Your existing startGame function
    function startGame(userId) {
        const formData = new FormData();
        formData.append('userId', userId);

        fetch('/pos/{{ $pos->id }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
    }
</script>
@endsection

@section('content')
<div class="container-fluid">
    <h1>Team List</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Teams
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($teams as $team)
            <button class="dropdown-item" id="play{{ $team->user->id }}">{{ $team->name }}</button>
            @endforeach
        </div>
      </div>
{{ Log::info(session()->get('playingteams')) }}
      @livewire('TeamTable', ['playingteams'=> session()->get('playingteams'), 'posId'=> $pos->id])
</div>
@endsection







