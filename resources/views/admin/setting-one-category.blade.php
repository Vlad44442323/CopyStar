@extends('layouts.app')

@section('title', ('Настройка категории «'.$category->name.'»'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Настройка категории «{{$category->name}}»</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatecat',$category->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Название категории</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{$category->name}}" name="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">Адрес категории</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" value="{{$category->code}}" name="code" required>
                            </div>
                        </div>
                        
                        <div class="w-100 text-center mt-5 mb-3">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                        <a href="{{ route ('deletecat', $category->id) }}" class="btn btn-outline-danger">Удалить</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection