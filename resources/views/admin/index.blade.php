@extends('layouts/main')

@section('title', 'Панель администратора')

@section('menu')
@include('main-menu')
@endsection

@section('content')
<h1>Админка</h1>

<ul class="main-menu">
    <li class="main-menu__li">
        <a class="main-menu__link" href="{{ route('admin.newsAdd') }}">Добавить новость</a>
    </li>
</ul>
@endsection
