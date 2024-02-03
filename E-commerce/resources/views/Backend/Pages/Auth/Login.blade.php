@extends('Backend.Layouts.Links')
<title>Sign In</title>

@section('content')
    
{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h4 class="title">SIGN IN</h4>
        <div>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div>
            <input type="password" id="password" autocomplete="off" placeholder="Enter your password">
        </div>
        <div class="buttonDiv">
             <button type="submit" class="button" id="login" onclick="login()">NEXT</button>
        </div>
            <div class="formBottom">
            <a href="{{route('signup.view')}}">Sign Up</a> <span>|</span> <a href="{{route('forgotpass.view')}}">Forgot password</a>
        </div>
    </div>
</div>

<script>
    async function login() {
        const email = $("#email").val();
        const password = $("#password").val();

        if(email.length === 0) {
            errorTost("Please enter email address");
        } else if(password.length < 3) {
            errorTost("Please enter a strong password minimum 3 cherecter");
        } else if(password.length > 6) {
            errorTost("Please enter a strong password maximum 6 cherecter");
        } else {
            // alert(email + " " + password)
            showLoader();
            const response = await axios.post("/admin/login", {
                "email" : email,
                "password" : password
            });
            hideLoader();

            if(response.data['status'] === 1) {
                successTost(response.data['message']);
                setToken(response.data['token']);
                setTimeout(() => {
                    window.location.href = "/admin/dashboard";
                }, 1000);
            } else {
                errorTost(response.data['message']);
            }
        }

    }
</script>
@endsection