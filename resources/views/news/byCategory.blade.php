@extends('layouts.main')

@section('title')
    @parent Категории
@endsection

@section ('menu')
    @include('widgets.menu')
@endsection

@section('content')
    @if ($news)
        <h1>Рубрика: {{ $category }}</h1>
        @forelse($news as $item)
            <h2>{{ $item['title'] }}</h2>
            @if (!$item['isPrivate'])
                <a href="{{ route('news.newsOne', $item['id']) }}">Подробнее..</a>
            @endif
        @empty
            Нет новостей
        @endforelse
    @else
        Нет такой категории
    @endif
@endsection


{{--

<h2>Новости в рубрике: <?= $rubric ?> </h2>

<?php foreach ($news as $item): ?>

    <h3><a href="<?=route('news.newsOne', $item['id']) ?>"><?= $item['title'] ?></a></h3>

<?php  endforeach; ?>--}}


