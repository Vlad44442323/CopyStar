@extends('layouts.app')

@section('title', ($product->name) )
@section('content')
<div class="container">
    <div class="product-info">
        <div class="name-product"><h4>{{$product->name}}</h4></div>
        <div class="list-info__product">
        <img src="{{ asset('public/storage/'.$product->img) }}" class="img-info" alt="{{$product->img}}">
        <div class="price-card">
            <p class="price-title">Цена:</p>
        <p class="price_product">{{number_format($product->price ,0, '',' ') }}</p>
        @if (Auth::user())
        <form action="{{ route('basket.add', $product->id) }}"
            method="post" class="form-inline">
          @csrf
          <button type="submit" class="btn btn-primary w-100 mt-3 mb-3">Добавить в корзину</button>
          <label for="input-quantity">Количество</label>
          <input type="number" name="quantity" id="input-quantity" value="1"
                 class="form-control mx-2 w-25">
      </form>
  </div>
        @else
        Для того, чтобы добавить в корзину, нужно авторизоваться.
        @endif
        
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
    <div class="haracteristic mt-4">
        <p class="har-title">Артикул</p>
        <p>{{ $product->id }}</p>
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