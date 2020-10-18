@extends('layouts.app')

@section('title', 'Редактирование рубрик')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Новостные рубрики для редактирования')  }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @forelse($categories as $category)
                            <h3>
                                {{ __($category->title . '/' . $category->slug) }}
                            </h3>
                            <p>
  {{--                              <a class="btn btn-danger" href="{{ route('admin.category.destroy', $category) }}">Destroy</a>--}}
                            <form method="POST" action="{{ route('admin.category.destroy', $category) }}">
                                <a class="btn btn-success" href="{{ route('admin.category.edit', $category) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Destroy') }}
                                </button>
                            </form>
                            </p>
                        @empty
                            {{ __('Список новостных рубрик пуст!') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
