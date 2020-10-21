<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ isset($title) ? $title : 'No title' }}</title>
</head>

<body class="{{ $theme }}">
  
  @include('test-components.logo', ['src' => 'https://lh3.google.com/u/2/ogw/ADGmqu-669glsc8PQKRUiApHqEDUCvgzweBuv63wl8oW=s32-c-mo'])
  @include('test-components.header')

  <div class="container">
    @yield('content')
  </div>
  
  @if($show_footer)
    <footer>
      @yield('footer')
    </footer>
  @endif
</body>

</html>