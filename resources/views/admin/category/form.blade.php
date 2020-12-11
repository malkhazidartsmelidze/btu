@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New Category</div>

                <div class="card-body">
                    <form method="POST"
                        action="{{ isset($category) ? route('admin.category.update', ['category' => $category->id]) : route('admin.category.store') }}"
                        enctype="multipart/form-data">

                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Enter Category Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ isset($category) ? $category->name : old('name') }}" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($category) ? 'Update' : 'Create New' }} Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
