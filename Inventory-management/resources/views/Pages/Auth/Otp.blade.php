@extends('Layouts.Links')
<title>Verify Otp</title>

{{-- <!--=== Loader ===--> --}}
@include('Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('Components.PopUp')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">VERIFY OTP</h3>
        <hr>
        <div>
            <label for="email">Email :</label> <br>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div>
            <label for="otp">Otp :</label> <br>
            <input type="number" id="otp" maxlength="4" placeholder="Enter 4 digit otp">
        </div>
        <div class="buttonDiv">
            <button type="submit" id="sendOtp">CONFIRM</button>
        </div>
    </div>
</div>