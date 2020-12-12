@extends('layouts.main')

@section('content')
    <div class="row">
        @if (count($posts) == 0)
            <div class="alert alert-warning text-center" style="width: 100%">No Posts Found in this category</div>
        @else
            @foreach ($posts as $post)
                @include('components.post-card', ['post' => $post])
            @endforeach
        @endif
    </div>
@endsection
