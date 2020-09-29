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
                        {{ __('Добавьте новсть или новостную рубрику!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
