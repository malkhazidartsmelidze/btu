@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        <form method="POST" onsubmit="updateCategory(event)"
                            action="{{ route('admin.category.update', ['category' => $category->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Enter Category Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $category->name }}" requiredautofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Category
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('admin.category.table', ['categories' => $categories])
            </div>
        </div>
    </div>


@endsection

<script>
    function updateCategory(e) {
        e.preventDefault();
        var serializedForm = $(e.target).serialize()
        var url = $(e.target).attr('action')

        $.ajax({
            url: url + '?' + serializedForm,
            type: 'PUT',
            success: function(data) {
                refreshCategoryTable()
            },
            error: function() {

            },
        });
    }

</script>
