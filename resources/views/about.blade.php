@extends('layouts.app')

@section('title', 'О Нас')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('О Нас') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Курс GB PHP Laravel') }}
                        <p>Задание 7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
