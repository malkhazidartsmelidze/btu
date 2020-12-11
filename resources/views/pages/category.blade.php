@extends('layouts.front')

@section('content')
    <div class="row">
        @foreach ($category->posts as $post)
            @include('components.post', ['post' => $post])
        @endforeach
    </div>
@endsection
