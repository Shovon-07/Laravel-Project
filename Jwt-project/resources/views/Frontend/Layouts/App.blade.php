<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Mart</title>
    {{-- <!-- Fab icon --> --}}
    <link rel="icon" href="{{asset('assets/frontend')}}/images/Fav_Icon.png">
    {{-- <!-- bootstrap link --> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/bootstrap_css/bootstrap.min.css">
    {{-- <!-- css link --> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/sass.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/footer.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/responsive.css">
    {{-- <!-- font awesome link --> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/font_awesome/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/font_awesome/regular.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/font_awesome/fontawesome.css">
    {{-- <!-- Google icon --> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    {{-- <!-- OwlCarousel --> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/owl_carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/owl_carousel/owl.theme.default.min.css">
</head>

<body>
    <div>
        {{-- <!--=== Loader ===--> --}}
        {{-- @include('Frontend.Components.Loader') --}}

        {{-- <!--=== SideNav ===--> --}}
        @include('Frontend.Components.SideNav')

        {{-- <!--=== Header ===--> --}}
        @include('Frontend.Components.Header')
        
        <div class="main-panel">            
            @yield('content')
        </div>

        {{-- <!-- === Footer === --> --}}
        @include('Frontend.Components.Footer')

    </div>

    {{-- Js Plugins --}}
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/Loader.js')}}"></script>
    <script src="{{asset('assets/js/toastify.js')}}"></script>

    <script src="{{asset('assets/frontend')}}/js/jquery-v3.6.1.js"></script>
    <script src="{{asset('assets/frontend')}}/js/bootstrap_js/bootstrap.min.js"></script>
    <script src="{{asset('assets/frontend')}}/js/plugins/owl.carousel.min.js"></script>

    {{-- Script --}}
    <script src="{{asset('assets/frontend')}}/js/custome.js"></script>
    <script src="{{asset('assets/frontend')}}/js/custome_jquery.js"></script>
    <script src="{{asset('assets/frontend')}}/js/carousel.js"></script>
    <script src="{{asset('assets/js/popup.js')}}"></script>
    
</body>

</html>