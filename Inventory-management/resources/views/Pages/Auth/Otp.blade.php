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
            <label for="otp">Otp :</label> <br>
            <input type="number" id="otp" maxlength="4" placeholder="Enter 4 digit otp">
        </div>
        <div class="buttonDiv">
            <button type="submit" onclick="verifyOtp()">CONFIRM</button>
        </div>
    </div>
</div>

<script>
    async function verifyOtp() {
        const otp = document.querySelector("#otp").value;
        const email = sessionStorage.getItem('email');

        if(otp.length != 4) {
            showTost("Please enter 4 digit otp");
        } else {
            showLoader();
            let res = await axios.post('/verify-otp', {
                "otp" : otp,
                "email" : email 
            });
            hideLoader();

            if(res.data['status'] === 'success') {
                showTost(res.data['message']);
                setTimeout(() => {
                    window.location.href = '/update-password';
                }, 1000);
            } else {
                showTost(res.data['message']);
            }
        }
    }
</script>