@extends('lo.layouts.app')

@section('title',"Pos {{ $pos->pos_code }}")

@section('script')
<script>

</script>
@endsection

@section('content')
<div class="container-fluid">
    <h1>Pos List</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Teams
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($players as $player)
            <a class="dropdown-item" href="/pos/{{ $pos->id }}/{{ $player->id }}">{{ $player->name }}</a>
            @endforeach
        </div>
      </div>
</div>
@endsection




