@extends('Layouts.Links')
<title>Sign In</title>

{{-- <!--=== Loader ===--> --}}
@include('Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('Components.PopUp')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">SIGN IN</h3>
        <hr>
        <div>
            <label for="email">Email :</label> <br>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div>
            <label for="password">Password :</label> <br>
            <input type="password" id="password" placeholder="Enter your password">
        </div>
        <div class="buttonDiv">
            <button type="submit" id="login">NEXT</button>
        </div>
        <div class="formBottom">
            <a href="{{route('signup.view')}}">Sign Up</a> <span>|</span> <a href="{{route('forgotpass.view')}}">Forgot password</a>
        </div>
    </div>
</div>