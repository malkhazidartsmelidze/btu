@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Edit Product</h3>
  </div>

  <form action="{{ route('products.update') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">

    <div class="card-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
      </div>
      <div class="form-group">
        <label>Category</label>
        <input type="text" name="category" value="{{ $product->category }}" class="form-control">
      </div>
    </div>

    <div class="card-footer">
      <button class="btn btn-success">Save</button>
    </div>
  </form>

</div>
@endsection