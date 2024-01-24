@extends('lo.layouts.app')

@section('title', 'Puzzle ' . $puzzle->pos_code)

@section('script')
    <script></script>
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Team List</h1>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Teams
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($teams as $team)
                    @if ($team->exp < $puzzle->entry_exp || $team->coin < $puzzle->entry_coin)
                        <span class="dropdown-item disabled">{{ $team->name }} Dont Have Enough EXP or COIN</span>
                    @else
                        <a class="dropdown-item"
                            href="/story/{{ $puzzle->id }}/{{ $team->user->id }}">{{ $team->name }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
