@extends('layouts.app')

@section('title', 'Панель администратора')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center py-3">
        <div class="card text-center col-md-8">
            <div class="card-header">
                - || -
            </div>
            <div class="card-body py-5">
                <h1 class="card-title">СRUD категории</h1>
                <div class="card-text">
                    <h2>Консоль администратора</h2>
                    <a class="btn btn-primary mt-4" href="{{ route('admin.category.create') }}">
                        Добавить категорию
                    </a>
                    <div class="card mt-5">
                        @forelse($categories as $item)
                            <div class="py-2">
                                <div class="row justify-content-center ">
                                    <div class="d-flex col-6 justify-content-between">
                                        <div class="d-flex flex-column justify-content-center col-5">
                                            <div>Название</div>
                                            <div>{{$item->title}}</div>
                                        </div>
                                        <div class="col-5">
                                            <div class="badge bg-primary text-wrap p-2">slug</div>
                                            <div>{{$item->slug}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <div class="d-flex justify-content-between col-6 align-self-center">
                                   <a href="{{route('admin.category.edit', $item)}}" class="btn btn-success m-4">
                                       Редактировать категорию
                                   </a>
                                   <form class="d-inline" action="{{route('admin.category.destroy', $item)}}"
                                         method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger m-4">
                                           Удалить категорию
                                       </button>
                                   </form>
                               </div>
                        @empty
                            <p>Нет категорий</p>
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
