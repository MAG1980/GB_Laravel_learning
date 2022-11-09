@extends('layouts.main')

@section('title', 'Категории')

@section('menu')
    @include('main-menu')
@endsection

@section('content')

    @forelse($categories as $category)
        <a href="{{ route('news.category.selectedCategory', $category['slug']) }}">
            <h2>{{ $category['name'] }}</h2>
        </a>
    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection
