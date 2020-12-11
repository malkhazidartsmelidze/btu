@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New Config</div>

                <div class="card-body">
                    <form method="POST"
                        action="{{ isset($config) ? route('admin.config.update', ['config' => $config->id]) : route('admin.config.store') }}"
                        enctype="multipart/form-data">

                        @csrf
                        @if (isset($config))
                            @method('PUT')
                        @endif

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Enter Config Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ isset($config) ? $config->name : old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Enter Config Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('value') is-invalid @enderror" name="value"
                                    value="{{ isset($config) ? $config->value : old('value') }}" required
                                    autocomplete="value" autofocus>

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($config) ? 'Update' : 'Create New' }} Config
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
