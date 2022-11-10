@extends('layouts/main')

@section('title', 'Панель администратора')

@section('menu')
@include('main-menu')
@endsection

@section('content')
<h1 class="text-primary my-5 text-center">Админка</h1>

<ul class="list-unstyled">
    <li>
        <a class="btn btn-primary" href="{{ route('admin.newsAdd') }}">Добавить новость</a>
    </li>
</ul>
@endsection
