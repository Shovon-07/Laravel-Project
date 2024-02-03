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
    {{-- Css Plugins --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap_css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/Loader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/popup.css')}}">
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/form.css')}}">
    {{-- Font awesome --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/font_awesome/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/css/font_awesome/fontawesome.min.css')}}" />

</head>
<body>

    <div>
        {{-- <!--=== Loader ===--> --}}
        @include('Backend.Components.Loader')
        @yield('content')
    </div>

{{--
    --}}

{{-- Js Plugins --}}
<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/axios.min.js')}}"></script>
{{-- <script src="{{asset('assets/backend/js/bootstrap_js/bootstrap.min.js')}}"></script> --}}
<script src="{{asset('assets/backend/js/Loader.js')}}"></script>
<script src="{{asset('assets/backend/js/toastify.js')}}"></script>
<script src="{{asset('assets/backend/js/popup.js')}}"></script>

{{-- Script --}}
<script src="{{asset('assets/backend/js/app.js')}}"></script>
<script src="{{asset('assets/backend/js/config.js')}}"></script>

</body>

</html>