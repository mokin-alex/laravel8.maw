@extends('layouts.app')

@section('title', 'Новость')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if ($news)
                    <div class="card-header">{{ __($news->title)  }}</div>
                    @else
                        <div class="card-header">{{ __('Вот это новость!')  }}</div>
                    @endif
                    <div class="card-body">
                        <div >
                            <img class="card-img-top" src="{{ $news->image ?? asset('/storage/default.jpg')}}">
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if ($news)
                                @if (!$news->isPrivate)
                                    <p>{{ __($news->text) }}</p>
                                @else
                                    <p>{{ __('Зарегистрируйтесь для просмотра') }}</p>
                                @endif
                            @else
                                <p>{{ __('Нет новости с таким id') }}</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



