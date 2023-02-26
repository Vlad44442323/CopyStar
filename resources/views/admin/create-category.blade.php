@extends('layouts.app')

@section('title', 'Добавить категорию')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добавление категории') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createcategory') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Название категории</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">Адрес категории</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" required>
                            </div>
                        </div>
                        
                        <div class="w-100 text-center mt-5 mb-3">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection