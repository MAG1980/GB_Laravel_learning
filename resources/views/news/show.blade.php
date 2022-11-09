@extends('layouts.main')

@section('title', "Страница одной новости")

@section('menu')
    @include('main-menu')
@endsection

@section('content')
@if($news)
    <h1>{{ $news['title'] }}</h1>
    <h2> Новость № {{ $news['id'] }}</h2>
    <div>{{ $news['text'] }}</div>
    @else
    <p>Нет новости с таким id!</p>
@endif
@endsection

