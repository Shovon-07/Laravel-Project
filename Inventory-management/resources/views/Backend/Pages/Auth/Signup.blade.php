@extends('Backend.Layouts.Links')
<title>Sign Up</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h4 class="title">SIGN UP</h4>
        <hr>
        <div class="d-flex">
            <div class="left">
                <div>
                    <label for="firstName">First name :</label> <br>
                    <input type="text" id="firstName" placeholder="Enter your first name">
                </div>
                <div>
                    <label for="email">Email :</label> <br>
                    <input type="email" id="email" placeholder="Enter your email address">
                </div>
                <div>
                    <label for="address">Address :</label> <br>
                    <input type="text" id="address" placeholder="Enter your address">
                </div>
            </div>
            <div class="right">
                <div>
                    <label for="lastName">Last name :</label> <br>
                    <input type="text" id="lastName" placeholder="Enter your last name">
                </div>
                <div>
                    <label for="mobile">Mobile No :</label> <br>
                    <input type="number" id="mobile" placeholder="Enter your mobile number">
                </div>
                <div>
                    <label for="password">Password :</label> <br>
                    <input type="password" id="password" placeholder="Enter your password">
                </div>
            </div>
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
        const firstName = document.querySelector("#firstName").value;
        const lastName = document.querySelector("#lastName").value;
        const email = document.querySelector("#email").value;
        const mobile = document.querySelector("#mobile").value;
        const address = document.querySelector("#address").value;
        const password = document.querySelector("#password").value;

        if(firstName <= 0) {
            showTost("Please enter first name");
        } else if(lastName <= 0) {
            showTost("Please enter last name");
        } else if(email <= 0) {
            showTost("Please enter email address");
        } else if(mobile <= 0) {
            showTost("Please enter mobile number");
        } else if(address <= 0) {
            showTost("Please enter your address");
        } else if(password <= 0) {
            showTost("Please enter a strong password");
        } else {
            showLoader();
            const response = await axios.post("/admin/sign-up",{
                "firstName": firstName,
                "lastName": lastName,
                "email": email,
                "mobile": mobile,
                "address": address,
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