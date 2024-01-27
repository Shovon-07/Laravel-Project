@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        @include('Backend.Components.Summery')
        @include('Backend.Components.Table')
    </section>
@endsection

<script>
    window.addEventListener('load', () => {
    userData();
  });
  
</script>