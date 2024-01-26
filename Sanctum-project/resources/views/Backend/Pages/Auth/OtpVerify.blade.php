@extends('Backend.Layouts.Links')
<title>Verify Otp</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">VERIFY OTP</h3>
        <div>
            <input type="number" id="otp" placeholder="Enter 6 digit otp">
        </div>
        <div class="buttonDiv">
            <button type="submit" class="button" onclick="verifyOtp()">CONFIRM</button>
        </div>
    </div>
</div>

<script>
    async function verifyOtp() {
        const otp = document.querySelector("#otp").value;
        if(otp.length < 6 || otp.length > 6) {
            showTost("Please enter 6 digit otp");
        } else {
            showLoader();
            const email = getSessionStorage();
            const response = await axios.post("/admin/verify-otp", {"email": email,"otp": otp});
            hideLoader();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                setTimeout(() => {
                    window.location.href = "/admin/update-password";
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>