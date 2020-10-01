@extends('layouts.app')

@section('title', 'Downloads')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Панель выгрузки данных') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h4>
                                <a class="nav-link card-body_link" href="{{ route('admin.download.news') }}">{{ __('Download News in Json format') }}</a>
                            </h4>
                            <h4>
                                <a class="nav-link card-body_link" href="{{ route('admin.download.categories') }}">{{ __('Download Rubric in Json format') }}</a>
                            </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
