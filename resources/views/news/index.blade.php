@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include("main-menu")
    @include('news.categories-menu')
@endsection

@section('content')
        <h1 class="text-primary my-5 text-center">Новости</h1>

        <div class="list-group">
            @forelse($news as $item)
                <a class="list-group-item list-group-item-action my-2 py-2"
                   href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}
                </a>
            @empty
                <div text-primary my-5 text-center fs-5>Новостей нет</div>
            @endforelse
        </div>
@endsection
