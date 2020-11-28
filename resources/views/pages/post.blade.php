<?php
use App\Models\Category; ?>
@extends('layouts.main')

@section('content')
    <section class="jumbotron ">
        <div class="container">
            <h1 class="jumbotron-heading">{{ $post->title }}</h1>
            <img src="{{ url($post->image) }}" alt="{{ $post->title }}" class="w-100 mb-5">

            <p class="lead text-left">{{ $post->text }}</p>

            <p>
                <a href="#" class="btn btn-secondary my-2">{{ $post->category->name }}</a>
                <a href="#" class="btn btn-secondary my-2">{{ $post->created_at->diffForHumans(now()) }}</a>
            </p>
        </div>
    </section>
@endsection
