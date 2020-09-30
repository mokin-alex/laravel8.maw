@extends('layouts.app')

@section('title', 'Administer | Add News')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Добавление новости') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.addNews') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Заголовок') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Текст новости') }}</label>

                                <div class="col-md-6">
                                    <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text" rows="5" required autocomplete="text"></textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="isPrivate" class="col-md-4 col-form-label text-md-right">{{ __('Приватная новость') }}</label>

                                <div class="col-md-6">
                                    <input id="isPrivate" type="radio" class="form-control form-control__line @error('isPrivate') is-invalid @enderror" name="isPrivate" value=true required autocomplete="isPrivate" autofocus>
                                    {{ __('Да, приватная новость') }}
                                    <input id="isPrivate" type="radio" class="form-control form-control__line @error('isPrivate') is-invalid @enderror" name="isPrivate" value=false checked required autocomplete="isPrivate" autofocus>
                                    {{ __('Нет, открытая новость') }}

                                    @error('isPrivate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Категория') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required autocomplete="category_id" autofocus>
                                        <option disabled selected>{{ __('Укажите рубрику') }}</option>
                                        @forelse($categories as $category)
                                            <option value="{{ __($category['id']) }}">{{ __($category['title']) }} | {{ __($category['slug']) }}</option>
                                        @empty
                                            <option disabled>{{ __('Укажите рубрику') }}</option>
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Добавить новость') }}
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
