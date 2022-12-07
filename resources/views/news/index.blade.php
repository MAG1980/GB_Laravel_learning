@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include("main-menu")
@endsection

@section('content')
    <div class="card container-lg ">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <h2 class="card-title text-center py-3">Категории</h2>
                    @include('news.category-menu')
                </div>
                <div class="list-group col-9">
                    <h1 class="card-title text-center py-3">Новости</h1>
                    @forelse($news as $item)
                        <a class="d-flex align-items-center justify-content-between px-3 list-group-item list-group-item-action my-2 py-2"
                           href="{{ route('news.show', $item) }}">
                            <img class="d-block col-2 rounded-3" src="{{ $item->image_path }}" alt="{{ $item->title }}">
                            <h5 class="text-right" >{{ $item->title }}</h5>
                        </a>
                    @empty
                        <div text-primary my-5 text-center fs-5>Новостей нет</div>
                    @endforelse
                </div>
            </div>
            {{$news->links()}}
        </div>
    </div>
@endsection
