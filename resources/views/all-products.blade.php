@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    Create Product
  </div>
  <form action="/products/store" method="post">
    @csrf
    
    <div class="card-body">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter Name" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Price</label>
        <input type="number" name="price" placeholder="Enter Price" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Category</label>
        <input type="text" name="category" placeholder="Enter Category" class="form-control">
      </div>
    </div>

    <div class="card-footer">
      <button type="reset" class="btn btn-danger">Cancel</button>
      <button class="btn btn-success">Save</button>
    </div>
  </form>
</div>

<div class="card">
  <div class="card-header">
    <h3>All Products</h3>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name ? $product->name : 'No Product Name' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category }}</td>
            <td>
              <a href="/products/delete?product_id={{ $product->id }}">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection