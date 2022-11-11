@extends('layouts.app')

@section('title')
    News-agregator
    {{--    Используется для добавления, а не замены контента родительского шаблона--}}
    @parent
@endsection


@section('menu')
    @include('main-menu')
@endsection
@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center vh-100">
        <div class="card text-center col-md-8">
            <div class="card-header">
                Самые актуальные новости со всех концов света!
            </div>
            <div class="card-body py-5">
                <p>Приветствую Ваc на странице агрегатора новостей! </p>
                <div class="card-text">
                    <div class="card-text">
                        <h1 class="card-title">Самая актуальная и интересная информация о происходящем в мире!</h1>

                        <p>Да что там в мире - во всей России!</p>
                    </div>
                </div>
                <a class="btn btn-primary mt-4" href="{{ route('news.index') }}">Приступить к чтению новостей</a>
            </div>
            <div class="card-footer text-muted">
                Самая достоверная информация для вас
            </div>
        </div>
    </div>
@endsection

