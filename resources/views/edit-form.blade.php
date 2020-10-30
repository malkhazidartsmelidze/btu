@extends('layouts.main')

@section('title', 'Edit Product')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Edit Product</h3>
  </div>

  <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
      
    @csrf
    
    <div class="card-body">
      <div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{ $product->name }}" placeholder="Enter Name" >
      </div>
      <div class="form-group">
        <label>Price</label>
        <input class="form-control" type="number" name="price" value="{{ $product->price }}" placeholder="Enter Price">
      </div>
      <div class="form-group">
        <label>Stock</label>
        <input class="form-control" type="number" name="stock" value="{{ $product->stock }}" placeholder="Enter Stock">
      </div>
      <div class="form-group">
        <label>Sale</label>
        <input class="form-control" type="number" name="sale" value="{{ $product->sale }}" placeholder="Enter Sale">
      </div>
      <div class="form-group">
        <label>Category</label>
        <input class="form-control" type="text" name="category" value="{{ $product->category }}" placeholder="Enter Category">
      </div>
    </div>

    <div class="card-footer">
      <button class="btn btn-success">Update</button>
    </div>
  </form>
  
</div>
@endsection