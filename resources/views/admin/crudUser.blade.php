@extends('layouts.app')

@section('title', 'Редактирование профайлов')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Профили пользователей для редактирования')  }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @forelse($users as $user)
                            <h3>
                                {{ __($user->name) }}
                            </h3>
                            <p>
                            <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                <a class="btn btn-success" href="{{ route('admin.user.edit', $user) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                            </p>
                        @empty
                            {{ __('Список пользователей пуст!') }}
                        @endforelse
                            {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
