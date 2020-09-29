@extends('layouts.app')

@section('title', 'VUE DEMO')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div id="app">
        <example-component></example-component>
    </div>
@endsection




