@extends('layouts.app')

@section('title', 'Добавление товара')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добавление товара') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createproduct') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Название товара</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="model" class="col-md-4 col-form-label text-md-end">Модель</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Стоимость товара (в рублях)</label>

                            <div class="col-md-6">
                                <input id="price" type="number" pattern="[0-9]" class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="desc" class="col-md-4 col-form-label text-md-end">Описание товара</label>

                            <div class="col-md-6">
                                <textarea name="desc" id="desc" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">Категория</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option hidden>Не выбрано</option>
                                    <option value="1">Лазерные принтеры</option>
                                    <option value="2">Струйные принтеры</option>
                                    <option value="3">Термопринтеры</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">Cтрана производитель</label>

                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control" required>
                                    <option hidden>Не выбрано</option>
                                    <option value="Россия\Russian">Россия\Russian</option>
                                    <option value="Китай\China">Китай\China</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">Год выпуска</label>
                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="img" class="col-md-4 col-form-label text-md-end">Фотография</label>
                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control" name="img" required>
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