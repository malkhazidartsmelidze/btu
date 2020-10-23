@extends('layouts.main')

@section('content')
<table class="table">
  <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Sale</th>
    <th>Date Added</th>
  </thead>

  <?php foreach ($products as $product): ?>
    <tr>
      <td>{{ $product->id }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->stock }}</td>
      <td>{{ $product->sale }}</td>
      <td>{{ $product->created_at }}</td>
    </tr>
  <?php endforeach; ?>
</table>
@endsection