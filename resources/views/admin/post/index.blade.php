@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><img src="{{ url($post->image) }}" width="100" height="100"></td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.post.destroy', ['post' => $post->id]) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
