@extends('layouts.app')

@section('title', 'Administer')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Административная панель') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Добавьте новость или новостную рубрику! Либо отредактируйте имеющиеся.') }}
                            <li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
                                <a class="card-body_link" href="{{ route('admin.news.index') }}">{{ __('Изменение новостей') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('admin.category.index')?'active':'' }}">
                                <a class="card-body_link" href="{{ route('admin.category.index') }}">{{ __('Изменение рубрик') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('admin.user.index')?'active':'' }}">
                                <a class="card-body_link" href="{{ route('admin.user.index') }}">{{ __('Изменение Профилей') }}</a>
                            </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
