@extends('Backend.Layouts.Links')
<title>Sign In</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h4 class="title">SIGN IN</h4>
        <hr>
        <div>
            <label for="email">Email :</label> <br>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div>
            <label for="password">Password :</label> <br>
            <input type="password" id="password" placeholder="Enter your password">
        </div>
        <div class="buttonDiv">
            <button type="submit" class="button" id="login" onclick="login()">NEXT</button>
        </div>
        <div class="formBottom">
            <a href="{{route('signup.view')}}">Sign Up</a> <span>|</span> <a href="{{route('recoverpass.view')}}">Forgot password</a>
        </div>
    </div>
</div>

<script>
    async function login() {
        const email = document.querySelector("#email").value;
        const password = document.querySelector("#password").value;

        if(email <= 0) {
            showTost("Please enter email address");
        } else if(password <= 0) {
            showTost("Please enter passward");
        } else {
            showLoader();
            const response = await axios.post("/admin/login", {
                "email" : email,
                "password" : password
            });
            hideLoader();
            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                setTimeout(() => {
                    window.location.href = "/admin/dashboard";
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>