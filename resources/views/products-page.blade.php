<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Products</title>
</head>

<body>
  <table border="1">
    <tr>
      <th>სახელი</th>
      <th>ფასი</th>
      <th>კატეგორია</th>
    </tr>

    @foreach($products as $pr)
    <tr>
      <td>{{ $pr->name }}</td>
      <td>{{ $pr->price }}</td>
      <td>{{ $pr->category }}</td>
    </tr>
    @endforeach

  </table>
</body>

</html>