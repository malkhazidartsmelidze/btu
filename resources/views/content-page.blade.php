@extends('layouts.main', [
  'color' => $color
])

@section('title', $test_title)

@section('content')
  <h2>{{ $text }}</h2>

  @if($show_button)
    @include('components.click-me-button', [
      'button_text' => $alert_text,
    ])
  @endif
@endsection