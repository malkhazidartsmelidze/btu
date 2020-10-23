@extends('layouts.main')

@section('content')
<table class="table">
  <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Sale</th>
    <th>Date Added</th>
    <th>Actions</th>
  </thead>

  
  <tbody>
  <form action="/product/save" method="post">
    @csrf
    <tr>
      <td colspan="2"><input type="text" name="name" class="form-control" /></td>
      <td><input type="text" name="category" class="form-control" /></td>
      <td><input type="number" name="price" class="form-control" /></td>
      <td><input type="number" name="stock" class="form-control" /></td>
      <td><input type="number" name="sale" class="form-control" /></td>
      <td><button class="btn btn-success">Add</button></td>
      <td>#</td>
    </tr>
  </form>
  @foreach($products as $product)
    <tr>
      <td>{{ $loop->index + 1 }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->category }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->stock }}</td>
      <td>{{ $product->sale }}</td>
      <td>{{ $product->created_at }}</td>
      <td>
        <form action="/product/delete" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">

          <button class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection