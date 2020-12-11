@extends('layouts.main')

@section('content')
    <div class="row">
        @if (!count($category->posts))
            <div class="alert alert-warning" style="width: 100%">No Posts Found In this category</div>
        @else
            @foreach ($category->posts as $post)
                @include('components.post', ['post' => $post])
            @endforeach
        @endif
    </div>
@endsection
