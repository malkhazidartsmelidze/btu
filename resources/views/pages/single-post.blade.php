@extends('layouts.main')

@section('content')
    <section class="jumbotron">
        <h1 class="jumbotron-heading">{{ $post->title }}</h1>
        <img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}">
        <p class="lead text-muted">{{ $post->text }}
    </section>
@endsection
