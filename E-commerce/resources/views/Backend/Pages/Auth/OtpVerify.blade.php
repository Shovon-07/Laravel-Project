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
            // const headerData = getSessionStorage();
            // alert(getSessionStorage());
            const response = await axios.post("/admin/verify-otp", getSessionStorage(), {"otp": otp});
            // const response = {
            //     method: 'post',
            //     url: '/admin/verify-otp',
            //     headers: {'email': headerData,},
            //     data : {'otp': otp}
            // };
            hideLoader();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                console.log(response.data);
                setTimeout(() => {
                    window.location.href = "/admin/update-password";
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>