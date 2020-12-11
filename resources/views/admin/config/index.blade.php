@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Configs</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($configs as $config)
                                <tr>
                                    <td>{{ $config->id }}</td>
                                    <td>{{ $config->name }}</td>
                                    <td>{{ $config->value }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.config.destroy', ['config' => $config->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('admin.config.edit', ['config' => $config->id]) }}"
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
