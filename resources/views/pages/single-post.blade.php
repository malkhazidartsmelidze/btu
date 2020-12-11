@extends('layouts.front')

@section('content')
    <section class="jumbotron">
        <div class="container">
            <h1 class="jumbotron-heading mb-4">{{ $post->title }}</h1>
            <img class="mb-4" src="{{ url($post->image) }}" alt="{{ $post->title }}" style="max-width: 100%;">
            <p class="lead mb-4 text-muted">{{ $post->text }}</p>
        </div>
    </section>
@endsection
