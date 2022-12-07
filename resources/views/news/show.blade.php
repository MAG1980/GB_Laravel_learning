@extends('layouts.app')

@section('title', "Страница одной новости")

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center py-5">
        <div class="card text-center col-md-8">
            <div class="card-header">
                Самые актуальные новости со всех концов света!
            </div>
            <img src="{{ $news->image_path }}" class="card-img-top h-100 d-block" alt="...">
            @if($news)
                <div class="card-body py-5">
                    <h1 class="card-title">{{ $news->title }}</h1>
                    <div class="card-text">
                        <p class="fs-4"> Новость № {{ $news->id }}</p>
                        <p class="fs-4"> Категория: {{ $news->category()->title }}</p>
                        @if($news->isPrivate || !Auth::check())
                            <div>
                                <p class="card-text">Скрытый контент доступен только авторизованным пользователям</p>
                                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                            </div>
                        @else
                            <div>{{ $news->text }}</div>
                        @endif
                    </div>
                </div>
            @else
                <div class="card-body py-5">
                    <div class="card-text fs-3">
                        <p>Нет новости с таким id!</p>
                    </div>
                </div>

            @endif
        <div class="card-footer text-muted">
            Самая достоверная информация для вас
        </div>
    </div>
</div>
@endsection

