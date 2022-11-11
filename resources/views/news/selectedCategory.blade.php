@extends('layouts.app')

@section('title', 'Categories')

@section('menu')
    @include('main-menu')
    @include('news.categories-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center">
        <h1 class="card-title">Новости категории {{ $selectedCategoryName }}</h1>
        <div class="card text-center col-md-8">

            @forelse ($news as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item['title'] }}</h2>
                        <div>
                            <img src="..." class="card-img-top" alt="...">
                        </div>
                        @if($item['isPrivate'])
                            <p>Для просмотра данной новости Вам необходимо войти в свой профиль</p>
                            <a class="btn btn-primary" href="{{ route('login') }}"> Авторизоваться</a>
                        @else
                            <a class="btn bg-info" href="{{ route('news.show', $item['id']) }}"> Подробнее...</a>
                        @endif
                    </div>
                </div>
            @empty
                <p>Нет новостей данной категории</p>
            @endforelse
        </div>
    </div>

@endsection



