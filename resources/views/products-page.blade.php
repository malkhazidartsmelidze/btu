@extends('layouts.main')

@section('content')

<div class="card">
  <div class="card-header">
    <h3>All Product</h3>
  </div>

  <div class="card-body">
    <table class="table">
      <form action="">
        <tr>
          <th><input type="number" name="id"  value="{{ request()->id }}" placeholder="Enter ID" class="form-control"></th>
          <th><input type="text" name="name" value="{{ request()->get('name') }}"  placeholder="Enter Name" class="form-control"></th>
          <th><input type="text" name="category" value="{{ request()->input('category') }}"  placeholder="Enter Category" class="form-control"></th>
          <th><input type="number" name="price" value="{{ request('price') }}"  placeholder="Enter Min Price" class="form-control"></th>
          <th><input type="number" name="stock" value="{{ request()->stock }}"  placeholder="Enter Stock" class="form-control"></th>
          <th><input type="number" name="sale" value="{{ request()->sale }}"  placeholder="Enter Sale" class="form-control"></th>
          <th><button class="btn btn-primary">Filter</button></th>
          <th><a href="{{ route('products.all') }}" type="reset" class="btn btn-danger">Clear</a></th>
        </tr>
      </form>
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Sale</th>
        <th>Date</th>
        <th>Actions</th>
      </thead>

      <tbody>
      <form action="{{ route('products.save') }}" method="post">
        @csrf
        <tr>
          <td colspan="2"><input type="text" name="name" class="form-control" /></td>
          <td><input type="text" name="category" class="form-control" /></td>
          <td><input type="number" name="price" class="form-control" /></td>
          <td><input type="number" name="stock" class="form-control" /></td>
          <td><input type="number" name="sale" class="form-control" /></td>
          <td><button class="btn btn-success">Add</button></td>
          <td>Delete</td>
          <td>Edit</td>
        </tr>
      </form>
      @foreach($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->category }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->stock }}</td>
          <td>{{ $product->sale }}</td>
          <td>{{ $product->created_at }}</td>
          <td>
            <form action="{{ route('products.delete') }}" method="post">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">

              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
          <td>
            <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection