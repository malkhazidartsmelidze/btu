<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style.css">
  <title>All Products</title>
</head>
<body>
  <div class="container">
    @foreach ($products as $pr)
    <div class="product">
      <h3>{{ $pr->name }}</h3>
      <p>${{ $pr->price }}</p>
      <span>{{ $pr->category }}</span>
      <hr>
      @if($pr->created_at)
        <p>Created {{ $pr->created_at->diffInMinutes() }} Minutes Ago</p>
      @endif
    </div>
    @endforeach
  </div>
</body>
</html>