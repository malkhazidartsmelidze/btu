<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>

  @include('components.menu')
  
  @yield('content')

  <footer style="position: absolute; bottom: 0; background: green; color: black; height: 50px; width: 100%;">
    This is footer | 

    @yield('contact-info')
  </footer>
  
</body>
</html>