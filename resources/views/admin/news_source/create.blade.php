@extends('layouts.app')

@section('title', 'Добавление категорий администратором')

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
                            {{$newsSource->id ? 'Редактировать' : 'Добавить'}} источник новостей
                        </div>

                        <div class="card-body">
                            <!-- Если $newsSource содержит поле id, значит мы не создаём источник новостей, а
                            редактируем-->
                            <form id="news_source__add"
                                  action="{{ $newsSource->id ? route('admin.news_source.update', $newsSource): route
                                  ('admin.news_source.store') }}"
                                  method="post">
                                @csrf
                                <input type="hidden" name="_method" value="{{ $newsSource->id ? 'PATCH' : 'POST'}}">

                                <div class="row mb-3 align-items-center">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="news_source__title">Название источника</label>
                                        <input type="hidden" name="id" value="{{ $newsSource->id }}">

                                        @if($errors->has('title'))
                                            @foreach($errors->get('title') as $error)
                                                <label for="news_source__title"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <input id="news_source__title" type="text" name="title"
                                               class="form-control"
                                               value="{{ $newsSource->title ?? old('title') }}">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="news_source__link">Ссылка на источник</label>

                                        @if($errors->has('link'))
                                            @foreach($errors->get('link') as $error)
                                                <label for="news_source__link"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <input id="news_source__link" type="text" name="link"
                                               class="form-control"
                                               value="{{ $newsSource->link ?? old('link') }}">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">{{$newsSource->id ? 'Сохранить'
                                         : 'Добавить'}} источник новостей
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
