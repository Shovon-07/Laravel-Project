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
            <button type="submit" onclick="sendOtp()">SEND OTP</button>
        </div>
    </div>
</div>

<script>
    async function sendOtp() {
        const email = document.querySelector("#email").value;
        if(email == 0) {
            showTost("Please enter email address");
        } else {
            showLoader();
            let res = await axios.post('/send-otp', {"email" : email});
            hideLoader();

            if(res.data['status'] === 'success') {
                showTost(res.data['message']);
                sessionStorage.setItem('email', email);
                setTimeout(() => {
                    window.location.href = '/otp';
                }, 1000);
            } else {
                showTost(res.data['message']);
            }
        }
    }
</script>