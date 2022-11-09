@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include("main-menu")
    @include('news.categories-menu')
@endsection

@section('content')
        <h2>Новости</h2>

    @forelse($news as $item)
        <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a><br>
        <hr>
    @empty
        <div>Новостей нет</div>
    @endforelse
@endsection
