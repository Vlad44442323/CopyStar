@extends('layouts.app')

@section('content')
<div class="container">
<h3 class="text-center mb-5">Корзина</h3>
<div class="basket-list">
    @foreach ($product as $p)
        {{$p->name}}
    @endforeach
</div>
</div>
@endsection