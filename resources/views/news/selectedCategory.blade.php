@extends('layouts.main')

@section('title', 'Categories')

@section('menu')
    @include('main-menu')
    @include('news.categories-menu')
@endsection

@section('content')
    <h2>Категория новостей: {{ $selectedCategoryName }}</h2>

   @foreach ($news as $item)
    <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a><br>
   @endforeach
@endsection



