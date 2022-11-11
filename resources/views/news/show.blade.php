@extends('layouts.app')

@section('title', "Страница одной новости")

@section('menu')
    @include('main-menu')
@endsection

@section('content')
<div class="card container-lg">
    @if($news)



</div>

<div class="card container-lg d-flex align-items-center justify-content-center vh-100">
    <div class="card text-center col-md-8">
        <div class="card-header">
            Самые актуальные новости со всех концов света!
        </div>
        <div class="card-body py-5">
            <h1 class="card-title">{{ $news['title'] }}</h1>
            <div class="card-text">
                <p class="fs-4"> Новость № {{ $news['id'] }}</p>
                @if($news['isPrivate'])
                    <div>
                        <p class="card-text">Скрытый контент доступен только авторизованным пользователям</p>
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </div>
                @else
                    <div>{{ $news['text'] }}</div>
                @endif
                @else
                    <p>Нет новости с таким id!</p>
                @endif
            </div>
        </div>
        <div class="card-footer text-muted">
            Самая достоверная информация для вас
        </div>
    </div>
</div>
@endsection

