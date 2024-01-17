@extends('Backend.Layouts.Links')
<title>Sign Up</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h4 class="title">SIGN UP</h4>
        <div>
            <input type="text" id="name" placeholder="Enter user name">
        </div>
        <div>
            <input type="email" id="email" placeholder="Enter your email address">
        </div>
        <div>
            <input type="password" id="password" autocomplete="off" placeholder="Enter your password">
        </div>
        <div class="buttonDiv">
            <button type="submit" class="button" onclick="register()">COMPLEATE</button>
        </div>
        <div class="formBottom">
            <span>Already have an account ?</span><a href="{{route('login.view')}}">Sign In</a>
        </div>
    </div>
</div>

<script>
    async function register() {
        const name = document.querySelector("#name").value;
        const email = document.querySelector("#email").value;
        const password = document.querySelector("#password").value;

        if(name <= 0) {
            showTost("Please enter first name");
        } else if(email <= 0) {
            showTost("Please enter email address");
        } else if(password <= 0) {
            showTost("Please enter a strong password");
        } else {
            showLoader();
            const response = await axios.post("/admin/sign-up",{
                "name": name,
                "email": email,
                "password": password
            });
            hideLoader();
            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                setTimeout(() => {
                    window.location.href = "/admin/"
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>