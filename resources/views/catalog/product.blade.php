@extends('layouts.app')

@section('title', 'Каталог')
@section('content')
<div class="container">
    <div class="product-info">
        <div class="name-product"><h4>{{$product->name}}</h4></div>
        <div class="list-info__product">
        <img src="{{ asset('public/storage/'.$product->img) }}" class="img-info" alt="{{$product->img}}">
        <div class="price-card">
            <p class="price-title">Цена:</p>
        <p class="price_product">{{number_format($product->price ,0, '',' ') }}</p>
        <a href="#" class="btn btn-primary w-100 mt-3">В корзину</a> 
    </div>
    </div>
    <div class="description-product">
        <h3>Описание</h3>
        <p>{{ $product->desc }}</p>
    </div>
<div class="description-product mt-5">
    <h3>Характеристики</h3>
    <div class="haracteristic mt-4">
        <p class="har-title">Тип</p>
        <p>{{ $product->category->name }}</p>
    </div>
    <div class="haracteristic mt-4">
        <p class="har-title">Модель</p>
        <p>{{ $product->model }}</p>
    </div>
    <div class="haracteristic mt-4">
        <p class="har-title">Год выпуска</p>
        <p>{{ $product->year }}</p>
    </div>
    <div class="haracteristic mt-4">
        <p class="har-title">Страна-производитель</p>
        <p>{{ $product->country }}</p>
    </div>
</div>
</div>
</div>
<style>
    .price_product
    {
        font-size: 25px;
    }
</style>
@endsection