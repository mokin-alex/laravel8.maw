@extends('layouts.app')

@section('title', 'Редактирование новостей')


@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список новостей для редактирования')  }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($news)
                            @forelse($news as $item)
                                <h4>{{ __($item->title) }}</h4>
                                <p>
                                <form method="POST" action="{{ route('admin.news.destroy', $item) }}">
                                    <a class="btn btn-success"
                                       href="{{ route('admin.news.edit', $item) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Destroy') }}
                                    </button>
                                </form>
                                </p>
                            @empty
                                {{ __('Нет новостей!') }}
                            @endforelse

                        @else
                            {{ __('Нет новостей') }}
                        @endif
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
