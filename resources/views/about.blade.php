@extends('layouts.app')

@section('title', 'About us')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center vh-100">
        <div class="card text-center col-md-8">
            <div class="card-header card-img" style="background-image: url({{ asset("storage/default.jpg") }})">
                Самые актуальные новости со всех концов света!
            </div>
            <div class="card-body py-5">
                <h1 class="card-title">
                    Информация об агрегаторе новостей
                </h1>
                <div class="card-text">
                    <p>Самая актуальная и интересная информация о происходящем в мире!</p>
                    <p>Да что там в мире - во всей России!</p>
                </div>
                <a class="btn btn-primary mt-4" href="{{ route('news.index') }}">Приступить к чтению новостей</a>
            </div>
            <div class="card-footer text-muted">
                Самая достоверная информация для вас
            </div>
        </div>
    </div>
@endsection

