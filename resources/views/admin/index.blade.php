@extends('layouts.app')

@section('title', 'Панель администратора')

@section('menu')
@include('main-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center vh-100">
        <div class="card text-center col-md-8">
            <div class="card-header">
                - || -
            </div>
            <div class="card-body py-5">
                <h1 class="card-title">Консоль администратора</h1>
                <div class="card-text">

                </div>
                <a class="btn btn-primary mt-4" href="{{ route('admin.newsAdd') }}">
                    Добавить новость
                </a>
            </div>
            <div class="card-footer text-muted">
                - || -
            </div>
        </div>
    </div>
@endsection
