@extends('layouts.app')

@section('title', 'Categories')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center">

        <div class="row col-12 my-3">
            <div class="col-4">
                @include('news.category-menu')
            </div>
            <div class="card text-center col-8 py-4">
                <h1 class="card-title my-3">{{ $selectedCategory->title }}</h1>
                @forelse ($news as $item)
                    <div class="card mb-3 py-3">
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->title }}</h2>
                            <div>
                                <img src="{{ $item->image_path }}" class="card-img-top" alt="...">
                            </div>
                            @if($item->isPrivate && !Auth::check())
                                <p>Для просмотра данной новости Вам необходимо войти в свой профиль</p>
                                <a class="btn btn-primary" href="{{ route('login') }}"> Авторизоваться</a>
                            @else
                                <a class="btn bg-info mt-3" href="{{ route('news.show', $item->id) }}"> Подробнее...</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>Нет новостей данной категории</p>
                @endforelse
            </div>
        </div>



    </div>

@endsection



