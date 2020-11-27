@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Post Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" requiredautofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Post Slug</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                                        value="{{ old('slug') }}" requiredautofocus>

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Post Category</label>

                                <div class="col-md-6">
                                    <select name="category_id" class="form-control @error('slug') is-invalid @enderror">
                                        <option value=""></option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Post Image</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-file-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ old('image') }}" requiredautofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Post Text</label>

                                <div class="col-md-6">
                                    <textarea name="text" class="form-control @error('image') is-invalid @enderror"
                                        id="text" cols="30" rows="10">{{ old('text') }}</textarea>

                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Post
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
