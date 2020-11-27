<?php
use App\Models\Category; ?>
@extends('layouts.main')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ url($post->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text font-weight-bold">{{ $post->title }}</p>
                        <p class="card-text">{{ substr($post->text, 0, 150) }}...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('front.post', ['slug' => $post->slug]) }}" type="button"
                                    class="btn btn-sm btn-outline-secondary">View</a>

                                <a href="{{ route('front.category', ['id' => $post->category_id]) }}" type="button"
                                    class="btn btn-sm btn-outline-secondary">
                                    {{ Category::where('id', $post->category_id)->first()->name }}
                                </a>
                            </div>
                            <small class="text-muted">{{ $post->created_at->diffInMinutes(now()) }} min</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
