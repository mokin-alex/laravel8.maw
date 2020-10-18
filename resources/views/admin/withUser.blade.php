@extends('layouts.app')

@section('title', 'Administer | Update Profile')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактируемый профиль') }}</div>

                    <div class="card-body">
                        <div class="col-md-6">
                            @if ($user->is_admin)
                                <p>Статус: Администратор</p>
                            @else
                                <p>Статус: Пользователь</p>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('admin.user.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('ID пользователя: '. $user->id ) }}</label>
                                <div class="col-md-6">
                                    <input id="id" type="number" name="id" hidden class="form-control" value="{{ $user->id }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Имя пользователя') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') ?? $user->name }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-mail адрес') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_admin"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Статус администратора') }}</label>

                                <div class="col-md-8 form-check">
                                    <input @if ($user->is_admin == 1 || old('is_admin') == 1) checked
                                           @endif id="is_admin" type="checkbox"
                                           class="form-control form-check-input @error('is_admin') is-invalid @enderror"
                                           name="is_admin" value=1 autocomplete="is_admin" autofocus>

                                    @error('is_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Новый пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Подтверждение нового пароля') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Изменить профиль') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
