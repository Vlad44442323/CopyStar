@extends('layouts.app')

@section('title', 'Copy Star')
@section('content')
<div class="container">
    <section class="main-new mb-5">
    <h1 class="text-center mb-3">Новинки</h1>
<div class="new-product">
    @foreach ($product as $p)
<div class="carousel">
    <img src="{{asset ('public/storage/'.$p->img)}}" alt="test">
    <h5>{{$p->name}}</h5>
    </div>
    @endforeach
</div>
</section>
<section class="about mt-5" id="company">
<h1 class="text-center mb-5">О нас</h1>
<img src="images/about.png" alt="test">
<p>Молодая компания "Copy Star", которая занимается продажей копировального оборудования. У нас расширенный ассортимент. 
    Компания начала свою работу в 2010 году, и, несмотря на высокую конкуренцию, практически
     сразу вошла в топ поставщиков оргтехники и печатного оборудования. 
     Мы постарались сделать удобный и функциональный сайт, 
     который помогает клиентам получить максимально полную информацию о товаре. 
     Постоянно растущее количество покупателей — лучший показатель нашей работы.
     Официальное представительство компании Olivetti (Италия) в России, СНГ и странах Балтии. Olivetti - признанный производитель банковских и специализированных принтеров, POS оборудования.
     Сотрудничая с нами, Вы можете быть уверены, что приобретаете 100% оригинальные товары с официальной гарантией производителя. 
     Мы оперативно доставляем товары по Москве и по всей территории РФ. Наша компания зарегистрирована на ведущем портале поставщиков - ЕАИСТ.
     В числе наших клиентов - образовательные учреждения, силовые ведомства, федеральные службы, жилищно-эксплуатационные организации, банки, 
     коммерческие структуры и, разумеется, частные лица. Наш магазин предоставляет качественный сервис и индивидуальный подход к каждому клиенту. 
     Наша задача - сделать Вашу покупку максимально удобной и приятной.</p>
</section></div>
@endsection