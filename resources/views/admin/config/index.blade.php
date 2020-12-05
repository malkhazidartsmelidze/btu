@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create Config</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.config.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Enter Config Key</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('key') is-invalid @enderror" name="key"
                                        value="{{ old('key') }}" requiredautofocus>

                                    @error('key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Enter Config Value</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('value') is-invalid @enderror"
                                        name="value" value="{{ old('value') }}" requiredautofocus>

                                    @error('value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Config
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Configs</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($configs as $config)
                                <tr>
                                    <td>{{ $config->id }}</td>
                                    <td>{{ $config->key }}</td>
                                    <td>{{ $config->value }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.config.destroy', ['config' => $config->id]) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" />
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
