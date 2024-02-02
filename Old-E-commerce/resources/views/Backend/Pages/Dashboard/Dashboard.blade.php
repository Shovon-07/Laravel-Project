@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        @include('Backend.Components.Summery')
        <div>
            <h2 class="title" style="margin-top:40px">Sells Report</h2>
            <canvas id="sellsChart" style="width: 100%;max-width:1500;height:400px;"></canvas>
        </div>
    </section>
@endsection

<script>
    window.addEventListener('load', () => {
        sellsChart();
    });
</script>