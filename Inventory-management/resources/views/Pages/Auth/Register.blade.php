@extends('Layouts.Links')
<title>Sign Up</title>

{{-- <!--=== Loader ===--> --}}
@include('Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('Components.PopUp')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">SIGN Up</h3>
        <hr>
        <div class="d-flex">
            <div class="left">
                <div>
                    <label for="firstName">First name :</label> <br>
                    <input type="text" id="firstName" placeholder="Enter your first name">
                </div>
                <div>
                    <label for="lastName">Last name :</label> <br>
                    <input type="text" id="lastName" placeholder="Enter your last name">
                </div>
                <div>
                    <label for="email">Email :</label> <br>
                    <input type="email" id="email" placeholder="Enter your email address">
                </div>
            </div>
            <div class="right">
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
            <button type="submit" onclick="register()">COMPLEATE</button>
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
        const password = document.querySelector("#password").value;

        if(firstName === 0) {
            showTost("Please enter first name");
        } else if(lastName === 0) {
            showTost("Please enter last name");
        } else if(email === 0) {
            showTost("Please enter email address");
        } else if(mobile === 0) {
            showTost("Please enter mobile number");
        } else if(password === 0) {
            showTost("Please enter password");
        } else {
            showLoader();
            let res = await axios.post("/registration", {
                "firstName" : firstName,
                "lastName" : lastName,
                "email" : email,
                "mobile" : mobile,
                "password" : password
            });
            hideLoader();

            if(res.data['status'] === 'success') {
                showTost(res.data['message']);
                setTimeout(() => {
                    window.location.href = '/';
                }, 1000);
            } else {
                showTost(res.data['message']);
            }
        }
    }
</script>