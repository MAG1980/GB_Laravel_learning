@extends('layouts.main')

@section('title', 'Login-page')

@section('menu')
@include('main-menu')
@endsection

@section('content')
    <form id="login__form" action="">
        <input type="text" placeholder="login">
        <input type="text" placeholder="password">
        <input id="login__checkbox" type="checkbox">
        <label for="login__checkbox">Запомнить меня</label>
        <button type="submit">Войти</button>
    </form>
@endsection


