@extends('Backend.Layouts.Links')
<title>Sign In</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

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
        let email = document.querySelector("#email").value;
        let password = document.querySelector("#password").value;

        if(email.length === 0) {
            showTost("Please enter email address");
        } else if(password.length === 0) {
            showTost("Please enter passward");
        } else {
            showLoader();
            const res = await axios.post("/admin/login", {
                'email' : email,
                'password' : password
            });
            hideLoader();
            
            if(res.data['status'] === 'success') {
                showTost(res.data['message']);
                setToken(res.data['token']);
                setTimeout(() => {
                    window.location.href = "/admin/dashboard";
                }, 1000);
            } else {
                showTost(res.data['message']);
            }
        }
    }
</script>