@extends('Layouts.Links')
<title>Sign Up</title>

{{-- <!--=== Loader ===--> --}}
@include('Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('Components.PopUp')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">SIGN Up</h3>
        <hr>
        <div class="d-flex">
            <div class="left">
                <div>
                    <label for="firstName">First name :</label> <br>
                    <input type="text" id="firstName" placeholder="Enter your first name">
                </div>
                <div>
                    <label for="lastName">Last name :</label> <br>
                    <input type="text" id="lastName" placeholder="Enter your last name">
                </div>
                <div>
                    <label for="email">Email :</label> <br>
                    <input type="email" id="email" placeholder="Enter your email address">
                </div>
            </div>
            <div class="right">
                <div>
                    <label for="mobile">Mobile No :</label> <br>
                    <input type="number" id="mobile" placeholder="Enter your mobile number">
                </div>
                <div>
                    <label for="password">Password :</label> <br>
                    <input type="password" id="password" placeholder="Enter your password">
                </div>
            </div>
        </div>
        <div class="buttonDiv">
            <button type="submit" id="login">NEXT</button>
        </div>
        <div class="formBottom">
            <span>Already have an account ?</span><a href="{{route('login.view')}}">Sign In</a>
        </div>
    </div>
</div>