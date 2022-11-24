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
                <h1 class="card-title">CRUD новости</h1>
                <div class="card-text">
                    <h2>Консоль администратора</h2>
                    <a class="btn btn-primary mt-4" href="{{ route('admin.news.create') }}">
                        Добавить новость
                    </a>
                    <div class="news mt-5">
                        @forelse($news as $item)
                            <h2>{{$item->title}}</h2>
                            <a href="{{route('admin.news.edit', $item)}}" class="btn btn-success m-4">
                                Редактировать новость
                            </a>
                            <form class="d-inline" action="{{route('admin.news.destroy', $item)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-4">
                                    Удалить новость
                                </button>
                            </form>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse</div>
                </div>

            </div>
            <div class="card-footer text-muted">
                - || -
            </div>
            {{ $news->links() }}
        </div>
    </div>
@endsection
