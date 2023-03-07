@extends('layouts.app')

@section('content')
<div class="container">
<h3 class="text-center mb-5">Корзина</h3>
<div class="basket-list">
    <table class="table table-bordered">
    <th>№</th>
    <th>Наименование</th>
    <th>Цена</th>
    <th>Кол-во</th>
    @php
    $itemQua = $product->quantity;
    @endphp
    @if (count($product->products))
    @foreach ($product->products as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <a href="{{ route('product', $p->name) }}">{{ $p->name }}</a>
        </td>
        <td>{{ number_format($p->price, 2, '.', '') }}</td>
        <td>
            <i class="fas fa-minus-square"></i>
            <span class="mx-1">{{ $itemQua }}</span>
            <i class="fas fa-plus-square"></i>
        </td>
    </tr>
    @endforeach
</table>
    @else 
    <p>Ваша корзина пустая</p>
    @endif
</div>
</div>
@endsection