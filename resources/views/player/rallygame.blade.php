@extends('player.layouts.app')

@section('title', "Rally")

@section('script')
<script>
</script>
@endsection

@section('content')
<div class="bg-cover bg-fixed h-screen w-screen" style="background-image: url('{{ asset('images/nplcbg.png') }}')">
    <div class="bg-cover bg-bottom bg-fixed bg-no-repeat h-screen w-screen "
        style="background-image: url('{{ asset('images/bottommoon.png') }}')">
        <div class="backdrop-blur-[1px] h-screen w-screen bg-white/20">
            <div class="h-screen w-screen flex flex-col gap-6 justify-center items-center">
                <div class="card p-2 bg-gradient-to-br from-gray-600 to-gray-500 rounded drop-shadow-md">
                    <div class="card p-5 bg-sky-500/90 rounded drop-shadow-md">
                        <h1 class="font-sans font-bold text-4xl text-slate-100 text-center drop-shadow-md">Rally Game</h1>
                    </div>
                </div>
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

