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
                        <div class="card-header text-center">{{ __('Добавить новость') }}</div>

                        <div class="card-body">

                            <form id="news__add" action="{{ route('admin.create') }} method='post">
                                <div class="row mb-3">
                                    <label for="news__title" class="col-md-4 col-form-label text-md-end">
                                        Заголовок новости
                                    </label>
                                    <div class="col-md-6">
                                        <input id="news__title" type="text" name="news__title" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="news__category" class="col-md-4 col-form-label text-md-end">
                                        Категория новости
                                    </label>
                                    <div class="col-md-6">
                                        <select id="news__category" type="text" name="news__title" class="form-control"
                                               value="">
                                            @forelse($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                            @empty
                                            <option value="0">Нет категории</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <label for="news__text" class="col-md-4 col-form-label text-md-end">
                                        Подробное описание новости
                                    </label>
                                    <div class="col-md-6">
                                        <textarea id="news__text" name="news__text" class="form-control"
                                                  ></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="news__descr" class="col-md-4 col-form-label text-md-end">
                                        Краткое описание новости
                                    </label>
                                    <div class="col-md-6">
                                        <input id="news__descr" type="text" name="news__descr" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="news__is-private" class="col-md-4 col-form-label text-md-end">
                                        Приватность
                                    </label>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <input id="news__is-private"
                                               type="checkbox"
                                               name="news__is-private"
                                               value="1"
                                               class="form-check-input"
                                        >
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Добавить новость
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
