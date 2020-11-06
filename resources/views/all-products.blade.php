@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    Create Product
  </div>
  <form action="{{ route('products.store') }}" method="post">
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
          <form>
            <th><input type="number" placeholder="ID Filter" value="{{ $filter->id }}"  name="id" class="form-control"></th>
            <th><input type="text" placeholder="Name Filter" value="{{ $filter->name }}" name="name" class="form-control"></th>
            <th><input type="number" placeholder="Min Price" value="{{ $filter->min_price }}" name="min_price" class="form-control"></th>
            <th><input type="number" placeholder="Max Price" value="{{ $filter->max_price }}" name="max_price" class="form-control"></th>
            <th><input type="text" placeholder="Category Filter" value="{{ $filter->category }}" name="category" class="form-control"></th>
            <th><button class="btn btn-primary">Filter</button></th>
          </form>
        </tr>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Delete</th>
          <th>Edit</th>
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
              <form action="{{ route('products.delete') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id" />
                <button class="btn btn-danger">Delete</button>
              </form>
            </td>
            <td>
              <a href="{{ route('products.edit') }}?product_id={{ $product->id }}">Edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection