@extends('layouts.main')

@section('title', 'Рубрики новостей')

@section ('menu')
    @include('widgets.menu')
@endsection

@section('content')
    @forelse($categories as $category)
        <a href="{{ route('news.category.show', $category['slug']) }}">
            <h2>{{ $category['title'] }}</h2>
        </a>
    @empty
        Нет категорий
    @endforelse

@endsection

{{--

<h2>Новости в рубрике: <?= $rubric ?> </h2>

<?php foreach ($news as $item): ?>

    <h3><a href="<?=route('news.newsOne', $item['id']) ?>"><?= $item['title'] ?></a></h3>

<?php  endforeach; ?>--}}


