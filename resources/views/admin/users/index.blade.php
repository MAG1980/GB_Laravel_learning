@extends('layouts.app')

@section('title', 'Администрирование пользователей')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container-lg d-flex align-items-center justify-content-center py-4">
        <div class="card text-center col-md-8">
            <div class="card-header">
                - || -
            </div>
            <div class="card-body py-5">
                <h1 class="card-title">CRUD пользователей</h1>
                <div class="card-text">
                    <h2>Консоль администратора</h2>
                    <a class="btn btn-primary mt-4" href="{{ route('admin.users.index') }}">
                        Добавить пользователя
                    </a>
                    <div class="users mt-5">
                        @forelse($users as $user)
                            <h2>Пользователь: {{$user->name}}</h2>
                            <a href="{{route('admin.users.index',$user)}}" class="btn btn-success m-4">
                                Редактировать данные
                            </a>
                            <a href="{{ route('admin.users.toggleAdminRights', $user) }}" type="button"
                               class="btn {{ $user->is_admin ? 'btn-danger' : 'btn-success' }}">
                                {{ $user->is_admin ? 'Лишить прав администратора' : 'Дать права администратора' }}</a>
                            <form class="d-inline" action="{{route('admin.users.index',$user)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-4">
                                    Удалить пользователя
                                </button>
                            </form>
                        @empty
                            <p>Нет пользователей</p>
                        @endforelse</div>
                </div>

            </div>
            <div class="card-footer text-muted">
                - || -
            </div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
