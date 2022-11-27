@extends('layouts.app')

@section('title', 'Регистрация')

@section('menu')
    @include('main-menu')
@endsection

@dump($errors)

@section('content')
    <div class="card container">
        <div class="row justify-content-center min-vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            {{$news->id ? 'Редактировать' : 'Добавить'}} новость
                        </div>

                        <div class="card-body">

                            <!-- Если $news содержит поле id, значит мы не создаём новость, а редактируем-->
                            <form id="news__add"
                                  action="{{ $news->id ? route('admin.news.update', $news):route('admin.news.store')
                                   }}"
                                  method="post">
                                @csrf
                                <input type="hidden" name="_method" value="{{ $news->id ? 'PATCH' : 'POST'}}">
                                <div class="row mb-3 align-items-center">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="news__title">Заголовок новости</label>

                                        @if($errors->has('title'))
                                            @foreach($errors->get('title') as $error)
                                                <label for="news__title"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <input id="news__title" type="text" name="title"
                                               class="form-control"
                                               value="{{ $news->title ?? old('title') }}">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="news__category" class="">Категория новости</label>

                                        @if($errors->has('category_id'))
                                            @foreach($errors->get('category_id') as $error)
                                                <label for="news__category"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                                @endforeach
                                                @endif
                                                </label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="news__category" type="text"
                                                name="category_id"
                                                class="form-control"> >
                                            @forelse($categories as $category)
                                                <option
                                                    {{ strval($category->id) === old('category_id') ? 'selected' : '' }}
                                                    value="{{ $category->id }}">
                                                    {{ $category->title }}
                                                </option>
                                            @empty
                                                <option value="0">Нет категории</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="news__title" class="">Подробное описание новости</label>

                                        @if($errors->has('text'))
                                            @foreach($errors->get('text') as $error)
                                                <label for="news__title"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                                @endforeach
                                                @endif
                                                </label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea id="news__text" name="text" class="form-control"
                                                  value="{{ $news->text ?? old('text') }}"
                                        ></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="d-flex flex-column col-md-4 col-form-label text-md-end">
                                        <label for="news__is-private">
                                            Приватность
                                        </label>
                                        @if($errors->has('isPrivate'))
                                            @foreach($errors->get('isPrivate') as $error)
                                                <label for="news__is-private"
                                                       class="{{ $error ? 'text-danger':''}}">
                                                    {{ $error }}
                                                </label>
                                                @endforeach
                                                @endif
                                                </label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <input id="news__is-private"
                                               type="checkbox"
                                               name="isPrivate"
                                               value="1"
                                               class="form-check-input"
                                            {{ $news->isPrivate ?? old('isPrivate') === '1' ? 'checked' : '' }}
                                        >
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{$news->id ? 'Сохранить' : 'Добавить'}} новость
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
