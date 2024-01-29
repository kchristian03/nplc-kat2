@extends('lo.layouts.app')

@section('title', 'Pos')

@section('content')
<div class="container-fluid">
    <h1>Pos List</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Pos
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($pos as $p)
                <a class="dropdown-item" href="/pos/{{ $p->id }}">{{ $p->id }}</a>
            @endforeach
        </div>
    </div>

    <h1>Puzzle List</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Puzzle
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($puzzle as $puz)
                <a class="dropdown-item" href="/story/{{ $puz->id }}">{{ $puz->pos_code }}</a>
            @endforeach
        </div>
    </div>

    <a class="btn btn-primary" href="/gamestart">Game Start</a>
    <a class="btn btn-danger" href="/gamestop">Game Stop</a>
</div>
@endsection
