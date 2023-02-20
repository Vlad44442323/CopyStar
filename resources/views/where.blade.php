@extends('layouts.app')

@section('title', 'Где найти нас?')
@section('content')
<div class="container">
    <section class="where mb-5">
    <h1 class="text-center mb-3">Контакты</h1>
    <div class="text-center">
    <div class="phone mb-3">
        <h3>Телефон</h3>
        <a href="tel:+79040534232">+7 (904) 053 42-32</a>
        </div>
        <div class="mail">
        <h3>Почта</h3>
        <a href="mailto:copy@star.ru">copy@star.ru</a>
    </div>
        </div>
</section>
<section class="map mt-5 text-center mb-5" id="company">
<h1 class="mb-5">Наш офис</h1>
<img src="images/map.jpg" class="w-100" alt="map">
</section>
</div>
</body>
@endsection