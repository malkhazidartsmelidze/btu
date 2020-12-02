@extends('layouts.front')

@section('content')
    <div class="row">
        @foreach (range(1, 20) as $p)
            @include('components.post', ['post' => $p])
        @endforeach
    </div>
@endsection
