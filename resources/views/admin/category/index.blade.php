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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($categories as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->slug }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.category.destroy', ['category' => $cat->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('admin.category.edit', ['category' => $cat->id]) }}"
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
