@extends('lo.layouts.app')

@section('title', 'Puzzle Control'.$puzzle->pos_code)

@section('script')
    <script>
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <button id="btn-start" class="btn btn-success">Start</button>
        <button id="btn-won" class="btn btn-success" disabled>Won</button>
        <button id="btn-lost" class="btn btn-success" disabled>Lost</button>
    </div>
@endsection

@section('footscript')
    @vite('resources/js/app.js')
    <script>
        const btnStart = document.getElementById('btn-start');
        const btnWon = document.getElementById('btn-won');
        const btnLost = document.getElementById('btn-lost');

        btnStart.addEventListener('click', () => {
            const userId = '{{ $player->id }}';
            const formData = new FormData();
            formData.append('userId', userId);

            btnStart.disabled = true;
            btnWon.disabled = false;
            btnLost.disabled= false;

            fetch('/start-timer', {
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
        });

        btnWon.addEventListener('click',()=>{
            const userId = '{{ $player->id }}';
            const puzzle = '{{ $puzzle->id }}';
            const formData = new FormData();
            formData.append('userId', userId);
            formData.append('puzzle',puzzle);
            console.log(userId);
            console.log(formData);
            fetch('/puzzle-won', {
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
            window.location.href = "/story/"+'{{ $puzzle->id }}';
        });

        btnLost.addEventListener('click',()=>{
            const userId = '{{ $player->id }}';
            const puzzle = '{{ $puzzle->id }}';
            const formData = new FormData();
            formData.append('userId', userId);
            formData.append('puzzle',puzzle);
            console.log(formData);
            fetch('/puzzle-lost', {
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
            window.location.href = "/story/"+'{{ $puzzle->id }}';
        });

    </script>
@endsection
