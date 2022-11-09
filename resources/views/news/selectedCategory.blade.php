@extends('layouts.main')

@section('title', 'Categories')

@section('menu')
    @include('main-menu')
    @include('news.categories-menu')
@endsection

@section('content')
    <h1>Новости категории {{ $selectedCategoryName }}</h1>

    @forelse ($news as $item)
        <h2>{{ $item['title'] }}</h2>
        @if($item['isPrivate'])
            <p>Для просмотра данной новости Вам необходимо войти в свой профиль</p>
            <a href="{{ route('login') }}"> Авторизоваться</a><br>
        @else
            <a href="{{ route('news.show', $item['id']) }}"> Подробнее...</a><br>
        @endif
    @empty
        <p>Нет новостей данной категории</p>
    @endforelse
@endsection



