@extends('layouts.main')

@section('title')
    News-agregator
{{--    Используется для добавления, а не замены контента родительского шаблона--}}
@parent
@endsection


@section('menu')
    @include('main-menu')
@endsection
@section('content')
    <div>
        <h1 class="text-primary my-5 text-center">Приветствую Ваc на странице агрегатора новостей!</h1>
    </div>
@endsection

