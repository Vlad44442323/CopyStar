@extends('layouts.app')

@section('title', 'Настройки категорий')
@section('content')
<div class="container">
    <div class="list__category-setting w-100">
        <table>
            <tr>
        <th>Название категории</th>
        <th>Адрес</th>
    </tr>
    @foreach ($category as $cat)
    <tr> 
        <td><a href="{{ route('settingOne',$cat->code) }}">{{$cat->name}}</a></td>
        <td><a href="{{ route('settingOne',$cat->code) }}">{{$cat->code}}</a></td>        
    </tr>
    @endforeach
        </table>        
    </div>
    <a href="{{route ('addcatalog')}}" class="btn btn-primary">Добавить</a>
</div>
<style>
    table
    {
        text-align: center;
    }
    th, td {
    text-align: left;
    padding: 20px;
}
.list__category-setting
{
    margin-bottom: 7rem;
}
</style>
@endsection