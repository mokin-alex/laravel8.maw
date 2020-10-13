@extends('layouts.app')
@if($category->id)
    @section('title', 'Administer | Update Rubric')
@else
    @section('title', 'Administer | Add Rubric')
@endif

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($category->id)
                        <div class="card-header">{{ __('Обновление рубрики') }}</div>
                    @else
                        <div class="card-header">{{ __('Добавление новой рубрики') }}</div>
                    @endif
                    <div class="card-body">
                        <form method="POST"
                              action="@if ($category->id){{  route('admin.category.update', $category) }} @else {{ route('admin.category.store') }}@endif">
                            @csrf
                            @if($category->id)
                                @method('PUT')
                            @endif
                            <input hidden id="id" type="number" name="id" value="0">
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Наименование рубрики') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('title') ?? $category->title }}" autocomplete="title"
                                           autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="slug" type="text"
                                           class="form-control @error('slug') is-invalid @enderror" name="slug"
                                           value="{{ old('slug') ?? $category->slug }}"  autocomplete="slug">

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if($category->id)
                                            {{ __('Обновить рубрику') }}
                                        @else
                                            {{ __('Добавить рубрику') }}
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
