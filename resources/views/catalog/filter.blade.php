@extends('layouts.app')

@section('title', 'Каталог')
@section('content')
<div class="container">
    <h1 class="text-center mb-3"><a href="{{route ('catalog')}}">Каталог</a></h1>
    <div class="list-category text-center mb-5 ">
        @foreach ($category as $cat)
           <a href="{{route ('category',$cat->code)}}" class="{{ request()->is('catalog='.$cat->code) ? 'activiti' : '' }}">{{$cat->name}}</a>
        @endforeach
        <a href="{{route ('addcatalog')}}" class="category__plus">+</a>
    </div>
    <div class="catalog">
        @if (count($products)) 
        @foreach ($products as $p )
        <div class="info-card">
            <a href="{{route ('product',$p->id)}}">
            <img src="{{asset ('public/storage/'.$p->img)}}" alt="test">
            <div class="card-title">
                <p class="price_product">{{number_format($p->price ,0, '',' ') }}</p>  
            </div>
            <p class="name_product">{{$p->name}}</p>
            </a>
            @if (Auth::user())
            <a href="#" class="btn btn-primary">В корзину</a>
            @else
            <a href="{{route ('product',$p->id)}}" class="btn btn-primary">Подробнее</a>
            @endif
            @if (Auth::check())
            @if (Auth::user()->role === "admin")
                <a href="#" class="btn btn-outline-success">🖊</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    🧺
                  </button>
                   <!-- Модальное окно -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Подтвердите действие</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        Вы действительно хотите удалить товар «{{$p->name}}» 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <a href="{{route ('deleteproduct',$p->id)}}" class="btn btn-outline-danger">Удалить</a>
      </div>
    </div>
  </div>
</div>
            @endif
                
            @endif
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