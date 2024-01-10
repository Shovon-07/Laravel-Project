@extends('Backend.Layouts.Links')
<title>Recover Password</title>
{{-- Icon --}}
<link rel="icon" href="{{asset('Uploaded_file/Img/user.png')}}">

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">SEND OTP</h3>
        <div>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div class="buttonDiv">
            <button type="submit" class="button" onclick="sendOtp()">SEND OTP</button>
        </div>
    </div>
</div>

<script>
    async function sendOtp() {
        const email = document.querySelector("#email").value;
        
        if(email <= 0) {
            showTost("Please enter email address");
        } else {
            showLoader();
            const response = await axios.post("/admin/send-otp", {'email': email});
            hideLoader();

            if(response.data['status']==='success') {
                showTost(response.data['message']);
                setTimeout(() => {
                    window.location.href = "/admin/verify-otp";
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>