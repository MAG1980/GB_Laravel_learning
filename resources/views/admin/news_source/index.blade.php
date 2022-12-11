@extends('layouts.app')

@section('title', 'Администрирование категорий')

@section('menu')
    @include('main-menu')
@endsection
{{--@dump($newsSources)--}}
@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center py-3">
        <div class="card text-center col-md-8">
            <div class="card-header">
                - || -
            </div>
            <div class="card-body py-5">
                <h1 class="card-title">СRUD источников новостей</h1>
                <div class="card-text">
                    <h2>Консоль администратора</h2>
                    <a class="btn btn-primary mt-4" href="{{ route('admin.news_source.create') }}">Добавить
                        источник</a>
                    <div class="mt-5">
                        @forelse($newsSources as $item)
                            <div class="card mb-5">
                                <div class="py-2">
                                    <div class="row justify-content-center ">
                                        <div class="d-flex flex-column col-8 justify-content-between fs-3">
                                            <div class="d-flex justify-content-between col-12 my-3">
                                                <div>Название</div>
                                                <div>{{$item->title}}</div>
                                            </div>

                                            <div class="d-flex justify-content-between col-12">
                                                <div>Ссылка</div>
                                                <div>{{$item->link}}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between col-6 align-self-center">
                                    <a href="{{route('admin.news_source.edit', $item)}}" class="btn btn-success m-4">
                                        Редактировать
                                    </a>
                                    <form class="d-inline" action="{{route('admin.news_source.destroy', $item)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-4">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p>Нет источников новостей</p>
                        @endforelse
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">
                - || -
            </div>
            {{--            {{ $categories->links() }}--}}
        </div>
    </div>
@endsection
