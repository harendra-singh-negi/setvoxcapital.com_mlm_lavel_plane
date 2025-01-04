@extends('frontend::layouts.app')
@section('title')
    {{ __('Home') }}
@endsection
@section('content')
    @foreach($homeContent as $content)
        @php
            $data = json_decode($content->data,true);
        @endphp
        @include('frontend::home.include.__'.$content->code,['data' => $data])
    @endforeach
@endsection


@section('script')
<script>
// Odometer active
  var odo = $('.odometer');
  odo.each(function () {
    $('.odometer').appear(function (e) {
      var countNumber = $(this).attr('data-count');
      $(this).html(countNumber);
    });
  });
</script>
@endsection
