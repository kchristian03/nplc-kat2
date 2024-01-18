@extends('lo.layouts.app')

@section('title',"Pos")

@section('script')
<script>

</script>
@endsection
<div class="container-fluid">
    <h1>Pos List</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pos
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($pos as $p)
            <a class="dropdown-item" href="/pos/{{ $p->id }}">{{ $p->pos_code }}</a>
            @endforeach
        </div>
      </div>
</div>
@section('content')

@endsection
