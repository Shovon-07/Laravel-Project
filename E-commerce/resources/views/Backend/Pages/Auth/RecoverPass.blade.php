@extends('Backend.Layouts.Links')
<title>Recover Password</title>

@section('content')    
    {{-- <!--=== Forgot password form ===--> --}}
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
            const email = $("#email").val();
            
            if(email.length === 0) {
                showTost("Please enter email address");
            } else {
                showLoader();
                const response = await axios.post("/admin/send-otp", {'email': email});
                hideLoader();

                if(response.data['status']==='success') {
                    showTost(response.data['message']);
                    setSessionData(response.data['email']);
                    
                    setTimeout(() => {
                        window.location.href = "/admin/verify-otp";
                    }, 1000);
                } else {
                    showTost(response.data['message']);
                }
            }
        }
    </script>
@endsection