@extends('layouts.app')

@if($news->id)
    @section('title', 'Administer | Update News')
@else
    @section('title', 'Administer | Add News')
@endif

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if($news->id)
                        <div class="card-header">{{ __('Изменение новости') }}</div>
                    @else
                        <div class="card-header">{{ __('Добавление новости') }}</div>
                    @endif

                    <div class="card-body">
                        <form method="POST"
                              action="@if ($news->id){{  route('admin.news.update', $news) }} @else {{ route('admin.news.store') }}@endif"
                              enctype="multipart/form-data">
                            @csrf
                            @if($news->id)
                                @method('PUT')
                            @endif

                            <input disabled hidden id="id" type="number" name="id" value="0">
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Заголовок') }}</label>

                                <div class="col-md-8">
                                    <input id="title" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="title"
                                           value=" {{ old('title') ?? $news->title}} " required autocomplete="title"
                                           autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Текст новости') }}</label>

                                <div class="col-md-8">
                                    <textarea id="text" class="form-control @error('text') is-invalid @enderror"
                                              name="text" rows="5" required
                                              autocomplete="text">{{ old('text') ?? $news->text}}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Рубрика') }}</label>
                                <div class="col-md-8">
                                    {{--                       <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required autocomplete="category_id" autofocus>
                                                               <option disabled selected>{{ __('Укажите рубрику') }}</option>
                                                               @forelse($categories as $category)
                                                                   <option disabled @if ($category['id'] == old('category_id')) selected @endif value="{{ __($category['id']) }}">{{ __($category['title']) }} | {{ __($category['slug']) }}</option>
                                                               @empty
                                                                   <option disabled>{{ __('Укажите рубрику') }}</option>
                                                               @endforelse
                                                           </select>--}}
                                    <select name="category_id" id="newsCategory" class="form-control">
                                        <option disabled selected>{{ __('Укажите рубрику') }}</option>
                                        @forelse($categories as $item)

                                            @if (old('category_id'))
                                                <option @if ($item->id == old('category_id')) selected
                                                        @endif value="{{ $item->id }}">{{ __($item->title .' | '. $item->slug) }}</option>
                                            @else
                                                <option @if ($item->id == $news->category_id) selected
                                                        @endif value="{{ $item->id }}">{{ __($item->title .' | '. $item->slug) }}</option>
                                            @endif
                                        @empty
                                            <option disabled value="0">Нет категорий</option>
                                        @endforelse
                                        <option value="123">Не верная категория</option>
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="isPrivate"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Приватная новость') }}</label>

                                <div class="col-md-8 form-check">
                                    <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked
                                           @endif id="isPrivate" type="checkbox"
                                           class="form-control @error('isPrivate') is-invalid @enderror"
                                           name="isPrivate" value=true autocomplete="isPrivate" autofocus>

                                    @error('isPrivate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Добавить картинку') }}</label>
                                <input id="image" type="file" name="image">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if($news->id)
                                            {{ __('Изменить новость') }}
                                        @else
                                            {{ __('Добавить новость') }}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
