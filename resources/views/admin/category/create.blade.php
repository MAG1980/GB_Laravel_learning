@extends('layouts.app')

@section('title', 'Регистрация')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container">
        <div class="row justify-content-center min-vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            {{$category->id ? 'Редактировать' : 'Добавить'}} категорию
                        </div>

                        <div class="card-body">
                            <!-- Если $category содержит поле id, значит мы не создаём категорию, а редактируем-->
                            <form id="category__add"
                                  action="{{ $category->id ? route('admin.category.update', $category): route('admin.category.store') }}"
                                  method="post">
                                @csrf
                                <input type="hidden" name="_method" value="{{ $category->id ? 'PATCH' : 'POST'}}">
                                <div class="row mb-3">
                                    <label for="category__title" class="col-md-4 col-form-label text-md-end">
                                        Название категории
                                    </label>
                                    <div class="col-md-6">
                                        <input id="category__title" type="text" name="title" class="form-control"
                                               value="{{ $category->title ?? old('title') }}">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="category__title" class=""> Название категории</label>

                                        @if($errors->has('title'))
                                            @foreach($errors->get('title') as $error)
                                                <label for="category__title"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <input id="category__title type="text" name="title"
                                               class="form-control"
                                               value="{{ $news->title ?? old('title') }}">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{$category->id ? 'Сохранить' : 'Добавить'}} категорию
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
