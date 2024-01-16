@extends('player.layouts.app')

@section('title',"Dashboard")

@section('script')
<script>
</script>
@endsection

@section('content')

<div class="container-fluid">
    <button id="btn-story" class="btn btn-primary">Story</button>
    <button id="btn-inventory" class="btn btn-primary" data-toggle="modal" data-target="#inventoryModal">Inventory</button>
    <button id="btn-shop" class="btn btn-primary" data-toggle="modal" data-target="#shopModal">Shop</button>
</div>

@include('player.inventory')
@include('player.shop')

@endsection
