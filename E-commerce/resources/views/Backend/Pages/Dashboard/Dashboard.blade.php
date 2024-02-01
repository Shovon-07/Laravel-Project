@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        @include('Backend.Components.Summery')
        <div>
            <h2 class="title" style="margin-top:30px">Sells report</h2>
            <canvas id="sellsChart" style="width: 100%;max-width:1500;height:400px;margin-bottom:50px"></canvas>
        </div>
    </section>
@endsection

<script>
</script>