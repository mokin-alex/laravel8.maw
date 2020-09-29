@extends('layouts.app')

@section('title', 'Рубрики')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Новостные рубрики')  }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @forelse($categories as $category)
                            <h4>
                                <a class="card-body_link" href="{{ route('news.category.show', $category['slug']) }}">{{ __($category['title']) }}</a>
                            </h4>
                        @empty
                        {{ __('Список новостных рубрик пуст!') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
