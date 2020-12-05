@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create Config</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.config.update', ['config' => $config->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Enter config Key</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('key') is-invalid @enderror" name="key"
                                        value="{{ $config->key }}" requiredautofocus>

                                    @error('key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Enter config Value</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('value') is-invalid @enderror"
                                        name="value" value="{{ $config->value }}" requiredautofocus>

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
                                        Edit Config
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
