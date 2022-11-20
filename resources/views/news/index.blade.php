@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include("main-menu")
@endsection

@section('content')
    <div class="card container-lg ">
        <div class="card-body">
            <h1 class="card-title text-center py-3">Новости</h1>
            @include('news.categories-menu')
            <div class="list-group">
                @forelse($news as $item)
                    <a class="list-group-item list-group-item-action my-2 py-2"
                       href="{{ route('news.show', $item) }}">{{ $item->title }}
                    </a>
                @empty
                    <div text-primary my-5 text-center fs-5>Новостей нет</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
