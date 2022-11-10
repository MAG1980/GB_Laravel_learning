@extends('layouts.main')

@section('title', 'Vue demo')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="app">
        <example-component></example-component>
    </div>
@endsection
