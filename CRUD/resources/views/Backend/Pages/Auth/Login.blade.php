@extends('Backend.Layouts.Links')
<title>Sign In</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h4 class="title">SIGN IN</h4>
        <div>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div>
            <input type="password" id="password" autocomplete="off" placeholder="Enter your password">
        </div>
        <div class="buttonDiv">
             <button type="submit" class="button" onclick="login()">NEXT</button>
        </div>
            <div class="formBottom">
            <a href="">Sign Up</a> <span>|</span> <a href="">Forgot password</a>
        </div>
    </div>
</div>

<script>
    function login() {
        window.location.href = "/dashboard";
    }
</script>