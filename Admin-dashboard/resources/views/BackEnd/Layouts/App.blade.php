<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    {{-- Plugins --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap_css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Loader.css')}}">
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <div>
        <!--=== Loader ===-->
        <div id="loader" class="LoadingOverlay d-none">
            <div class="Line-Progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        
        <!--=== Header ===-->
        @include('BackEnd.Components.Header')
        
        <div class="main-panel">
            @yield('content')
        </div>

        <!-- === Footer === -->
        @include('BackEnd.Components.Footer')

    </div>

    {{-- Js Plugins --}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/Loader.js')}}"></script>

    {{-- Script --}}
    <script src="{{asset('assets/js/app.js')}}"></script>

</body>

</html>