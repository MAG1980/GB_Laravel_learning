@extends('layouts.app')

@section('title', 'Профиль')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="card container">
        <div class="row justify-content-center my-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <h1 class="text-center mb-4">Профиль пользователя {{ Auth::user()->name }}</h1>
                    <div class="card">
                        <div class="card-header">Редактирование</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('updateProfile') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name"
                                               type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{ old('name') ?? $user->name }}"
                                               required
                                               autocomplete="name"
                                               autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email"
                                               type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') ?? $user->email}}"
                                               required
                                               autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password"
                                               type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required
                                               autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword"
                                           class="col-md-4 col-form-label text-md-end">Новый пароль</label>

                                    <div class="col-md-6">
                                        @if ($errors->has('newPassword'))
                                            @foreach($errors->get('newPassword') as $error)
                                                {{ $error }}
                                            @endforeach
                                        @endif

                                        <input id="newPassword" type="password" class="form-control"
                                               name="newPassword" autocomplete="newPassword">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword-confirm"
                                           class="col-md-4 col-form-label text-md-end">Подтверждение нового
                                        пароля</label>

                                    <div class="col-md-6">
                                        @if ($errors->has('newPassword_confirmation'))
                                            @foreach($errors->get('newPassword_confirmation') as $error)
                                                {{ $error }}
                                            @endforeach
                                        @endif

                                        <input id="newPassword-confirm" type="password" class="form-control"
                                               name="newPassword_confirmation" autocomplete="newPassword_confirmation">
                                        @error('newPassword_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Изменить профиль
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
