@extends('test-layout', [
  'show_footer' => $footer,
  'theme' => $theme,
  'title' => $title ?? null,
])

@section('content')
<h1>{{ $text }}</h1>
@endsection

@section('footer')
<p>{{ $footer_text }}</p>
@endsection