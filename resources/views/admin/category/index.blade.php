@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('admin.category.form')
            </div>
            <div class="col-md-6">
                @include('admin.category.table', ['categories' => $categories])
            </div>
        </div>
    </div>


@endsection
