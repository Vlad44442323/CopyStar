@extends('layouts.app')

@section('title', 'Каталог')
@section('content')
<div class="container">
    <h1 class="text-center mb-3">Категории</h1>
    <div class="list-category text-center mb-5 ">
        @foreach ($category as $cat)
            <a href="{{route ('category',$cat->code)}}">{{$cat->name}}</a>
        @endforeach
        @if (Auth::check())
        @if (Auth::user()->role === "admin")
        <a href="{{route ('addcatalog')}}" class="category__plus">+</a>
        @endif
      @endif  
    </div>
    <div class="catalog">
        @if(count($product))
        @foreach ($product as $p )
        <div class="info-card">
            <a href="{{route ('product',$p->name)}}">
            <img src="{{asset ('public/storage/'.$p->img)}}" alt="{{$p->img}}">
            <div class="card-title">
                <p class="price_product">{{number_format($p->price ,0, '',' ') }}</p>  
            </div>
            <p class="name_product">{{$p->name}}</p>
        </a>
            @if (Auth::user())
            <form action="{{ route('basket.add', $p->id) }}"
            method="post">
          @csrf
          <button type="submit" class="btn btn-primary">В корзину</button>
          <input type="number" class="d-none" value="1" name="quantity">
      </form>
            @else
            <a href="{{route ('product',$p->id)}}" class="btn btn-primary">Подробнее</a>
            @endif
            @if (Auth::check())
            @if (Auth::user()->role === "admin")
                <a href="{{ route('updateIndex',$p->id) }}" class="btn btn-outline-success">🖊</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    🧺
                </button>
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
                          <a href="{{ route('deleteproduct', $p->id) }}" class="btn btn-outline-danger">Удалить</a>
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