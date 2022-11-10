@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include("main-menu")
    @include('news.categories-menu')
@endsection

@section('content')
        <h1 class="text-primary my-5 text-center">Новости</h1>

    @forelse($news as $item)
        <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a><br>
        <hr>
    @empty
        <div>Новостей нет</div>
    @endforelse
@endsection
