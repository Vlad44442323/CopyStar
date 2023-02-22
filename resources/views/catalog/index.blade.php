@extends('layouts.app')

@section('title', 'Каталог')
@section('content')
<div class="container">
    <h1 class="text-center mb-5">Каталог</h1>
    <div class="catalog">
        @if(count($product))
        <div class="info-card">
            <img src="{{asset ('images/2.jpg')}}" alt="test">
            <div class="card-title">
                <p class="price_product">1 800</p>  
            </div>
            <p class="name_product">Название продукта</p>
        </div>
        @else
        <div class="not_element">
            <p>Каталог пуст</p>
        </div>
        @endif
    </div>
</div>
@endsection