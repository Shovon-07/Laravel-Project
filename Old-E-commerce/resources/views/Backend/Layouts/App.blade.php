<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{asset('assets/backend/images/Man&Doller.png')}}">
    {{-- Plugins --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap_css/bootstrap.min.css')}}">
     --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/Loader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/sideNav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summery.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/footer.css')}}">
    {{-- Font awesome --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/font_awesome/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/css/font_awesome/fontawesome.min.css')}}" />
</head>

<body>
    <div>
        {{-- <!--=== Loader ===--> --}}
        @include('Backend.Components.Loader')

        {{-- <!--=== SideNav ===--> --}}
        @include('Backend.Components.SideNav')
        
        <div class="main-panel">
            {{-- <!--=== Header ===--> --}}
            @include('Backend.Components.Header')
            
            @yield('content')

            {{-- <!-- === Footer === --> --}}
            @include('Backend.Components.Footer')
        </div>
    </div>

    {{-- Js Plugins --}}
    <script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/axios.min.js')}}"></script>
    {{-- <script src="{{asset('assets/backend/js/bootstrap_js/bootstrap.min.js')}}"></script> --}}
    <script src="{{asset('assets/backend/js/Loader.js')}}"></script>
    <script src="{{asset('assets/backend/js/toastify.js')}}"></script>
    <script src="{{asset('assets/backend/js/popup.js')}}"></script>
    <script src="{{asset('assets/backend/js/chart.umd.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script> --}}

    {{-- Script --}}
    <script src="{{asset('assets/backend/js/app.js')}}"></script>
    <script src="{{asset('assets/backend/js/config.js')}}"></script>
    <script src="{{asset('assets/backend/js/popup.js')}}"></script>
    <script src="{{asset('assets/backend/js/sellsChart.js')}}"></script>
    
</body>

</html>