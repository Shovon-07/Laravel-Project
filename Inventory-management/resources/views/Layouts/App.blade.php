<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    {{-- Plugins --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap_css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Loader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/toastify.css')}}">
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <div class="container">
        {{-- <!--=== Loader ===--> --}}
        @include('BackEnd.Components.Loader')

        {{-- <!--=== Pop Up ===--> --}}
        @include('BackEnd.Components.PopUp')
        
        {{-- <!--=== Header ===--> --}}
        @include('BackEnd.Components.Header')
        
        <div class="main-panel">
            @yield('content')
        </div>

        {{-- <!-- === Footer === --> --}}
        {{-- @include('BackEnd.Components.Footer') --}}

    </div>

    {{-- Js Plugins --}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/Loader.js')}}"></script>
    <script src="{{asset('assets/js/popup.js')}}"></script>
    <script src="{{asset('assets/js/toastify.js')}}"></script>

    {{-- Script --}}
    <script src="{{asset('assets/js/app.js')}}"></script>


<script>
    async function ViewProfile() {
        showLoader();
        let res = await axios.get("/admin/viewProfile");
        let name = res.data['name'];
        hideLoader();
  
        document.getElementById('userName').innerHTML = name;
    }
  
    ViewProfile();
  </script>
</body>

</html>