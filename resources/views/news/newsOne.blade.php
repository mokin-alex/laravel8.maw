@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    @if ($news)
        @if (!$news['isPrivate'])
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['text'] }}</p>
        @else
            <p>Зарегистрируйтесь для просмотра</p>
        @endif
    @else
        <p>Нет новости с таким id</p>
    @endif
@endsection



