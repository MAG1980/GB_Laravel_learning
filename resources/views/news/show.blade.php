@extends('layouts.main')

@section('title', "Страница одной новости")

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    @if($news)
        <h1>{{ $news['title'] }}</h1>
        <h2> Новость № {{ $news['id'] }}</h2>
        @if($news['isPrivate'])
            <div>
                <p>Скрытый контент доступен только авторизованным пользователям</p>
                <a href="{{ route('login') }}">Login</a>
            </div>
        @else
            <div>{{ $news['text'] }}</div>
        @endif
    @else
        <p>Нет новости с таким id!</p>
    @endif
@endsection

