@extends('Layouts.Links')
<title>Recover Password</title>

{{-- <!--=== Loader ===--> --}}
@include('Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('Components.PopUp')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">RECOVER PASSWORD</h3>
        <hr>
        <div>
            <label for="email">Email :</label> <br>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div class="buttonDiv">
            <button type="submit" id="sendOtp">SEND OTP</button>
        </div>
    </div>
</div>