@extends('layouts.app')

@section('title', 'Каталог')
<div class="container">
    <div class="product-info">
        {{$product->name}}
    </div>
</div>
@section('content')