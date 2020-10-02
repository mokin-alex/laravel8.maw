@extends('layouts.app')

@section('title', 'Главная')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Агрегатор новостей') }}</div>

                    <div class="card-body">
                        {{ __('Выбирайте новости по рубрикам') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




