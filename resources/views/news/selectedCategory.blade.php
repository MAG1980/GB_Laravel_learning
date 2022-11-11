@extends('layouts.main')

@section('title', 'Categories')

@section('menu')
    @include('main-menu')
    @include('news.categories-menu')
@endsection

@section('content')
    <h1 class="text-primary my-5 text-center">Новости категории {{ $selectedCategoryName }}</h1>

    @forelse ($news as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $item['title'] }}</h2>
                @if($item['isPrivate'])
                    <p>Для просмотра данной новости Вам необходимо войти в свой профиль</p>
                    <a class="btn btn-primary" href="{{ route('login') }}"> Авторизоваться</a><br>
                @else
                    <a class="btn bg-info" href="{{ route('news.show', $item['id']) }}"> Подробнее...</a><br>
                @endif
            </div>
        </div>
    @empty
        <p>Нет новостей данной категории</p>
    @endforelse
@endsection



