@extends('layouts.main')

@section('content')
    <div class="row">
        @if (count($posts) === 0)
            <div class="alert alert-warning" style="width: 100%">No Posts Found</div>
        @else
            @foreach ($posts as $post)
                @include('components.post', ['post' => $post])
            @endforeach
        @endif
    </div>
@endsection
