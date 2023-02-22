@extends('layouts.app')

@section('title', 'Каталог')
@section('content')
<div class="container">
    <h1 class="text-center mb-3">Каталог</h1>
    <div class="list-category text-center mb-5 ">
        @foreach ($category as $cat)
            <a href="{{route ('category',$cat->code)}}">{{$cat->name}}</a>
        @endforeach
    </div>
    <div class="catalog">
        @if(count($product))
        @foreach ($product as $p )
        <div class="info-card">
            <img src="{{asset ('public/storage/'.$p->img)}}" alt="test">
            <div class="card-title">
                <p class="price_product">{{number_format($p->price ,0, '',' ') }}</p>  
            </div>
            <p class="name_product">{{$p->name}}</p>
            <a href="#" class="btn btn-primary">В корзину</a>
        </div>
        @endforeach
        @else
        <div class="not_element">
            <p>Каталог пуст</p>
        </div>
        @endif
    </div>
</div>
@endsection