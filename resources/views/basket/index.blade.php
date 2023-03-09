@extends('layouts.app')

@section('title', 'Корзина')
@section('content')
<div class="container">
<h3 class="text-center mb-5">Корзина</h3>
<div class="basket-list">
    @if (isset($product))
    @php
        $itemSum = 0;
    @endphp
    <table class="table table-bordered">
    <th></th>
    <th>Наименование</th>
    <th>Цена</th>
    <th>Кол-во</th>
    @foreach ($product as $p)
    @php
    $itemQua = $p->basket->quantity;
        $itemPrice = $p->price;
        $itemCons =  $itemQua * $itemPrice;
        $itemSum = $itemSum + $itemCons;
    @endphp
    <tr>
        <td class="text-center"><img src="{{ asset('public/storage/'. $p->img) }}" alt="{{$p->name}}"></td>
        <td>
            <a href="">{{ $p->name }}</a>
        </td>
        <td>{{ number_format($p->price, 2, '.', '') }}</td>
        <td>
            <div class="d-flex">
            <form action="{{route ('basket.update', $p->basket->id)}}" method="post">
                @csrf
                <div class="quantity_inner mr-1">        
                    <button class="bt_minus">
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                    <input type="text" value="{{$itemQua}}" size="2" name="quantity" class="quantity" data-max-count="20" />
                
                    <button class="bt_plus">
                        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                </div>
            </form>
            <a href="{{ route('basket.delete', $p->basket->id) }}" class="btn btn-outline-danger">🧺</a>
        </div>
        </td>
    </tr>
    @endforeach
</table>
<p class="sum text-center">Итого: {{ number_format($itemSum, 2, '.', '') }} ₽</p>
    @else
    <p class="text-center pusto">Ваша корзина пустая</p>
    <div class="text-center"><button class="btn btn-primary">Оформить заказ</button></div>
    @endif
</div>
</div>
<style>
.quant
{
    width: 50px;
    outline: none;
}
.pusto
{
    font-size: 18px;
    margin: 20rem 0;
}
.sum 
{
    font-size: 20px;
    font-weight: bold;
}
table img
{
    width: 100px;
    text-align: center;
}
.quantity_inner * {
    box-sizing: border-box;    
}    
.quantity_inner {
    display: inline-flex;
    border-radius: 26px;
    position: relative;
    z-index: 1;
}        
.quantity_inner .bt_minus,
.quantity_inner .bt_plus,
.quantity_inner .bt_buy,
.quantity_inner .quantity {
    height: 40px;
    width: 40px;
    padding: 0;
    border: 0;
    margin: 0;
    background: #FFF;
    cursor: pointer;
    outline: 0;
    border-radius: 26px;
}
.quantity_inner .bt_buy {
    background: #337AB7;
    width: 90px;
    height: 48px;
    position: absolute;
    right: -70px;
    top: -4px;
    z-index: -1;
    border-radius: 0 26px 26px 0;
 
}
.quantity_inner .quantity {
    width: 60px;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    color: #000;
    font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
}
.quantity_inner .bt_minus svg,
.quantity_inner .bt_plus svg,
.quantity_inner .bt_buy svg {
    stroke: #337AB7;
    stroke-width: 4;
    transition: 0.5s;
    margin: 10px;
    fill: none;
    height: 20px;
    width: 20px;
}    
.quantity_inner .bt_buy svg {
    stroke: #BFE2FF;
    position: relative;
    left: 6px;
}    
.quantity_inner .bt_buy:hover svg {
    stroke: #FFF;
}
.quantity_inner .bt_minus:hover svg,
.quantity_inner .bt_plus:hover svg {
    stroke: #000;
}
</style>
@endsection