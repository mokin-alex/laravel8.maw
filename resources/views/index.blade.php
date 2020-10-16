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

                    <div class="card-body ">
                        {{ __('Выбирайте новости по рубрикам') }}

                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




