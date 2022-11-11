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
                                    <label for="news__name" class="col-md-4 col-form-label text-md-end">
                                        Название новости
                                    </label>
                                    <div class="col-md-6">
                                        <input id="news__name" type="text" name="news__name" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <label for="news__text" class="col-md-4 col-form-label text-md-end">
                                        Подробное описание новости
                                    </label>
                                    <div class="col-md-6">
                                        <textarea id="news__text" name="news__name" class="form-control"
                                                  ></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="news__descr" class="col-md-4 col-form-label text-md-end">
                                        Краткое описание новости
                                    </label>
                                    <div class="col-md-6">
                                        <input id="news__descr" type="text" name="news__name" class="form-control"
                                               value="">
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
