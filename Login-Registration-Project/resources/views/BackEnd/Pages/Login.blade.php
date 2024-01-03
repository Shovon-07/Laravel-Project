@extends('BackEnd.Layouts.Links')
<title>Login</title>

{{-- <!--=== Loader ===--> --}}
@include('BackEnd.Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('BackEnd.Components.PopUp')

{{-- <!--=== Login form ===--> --}}
<div class="login-container">
    <div class="card w-50 m-auto pt-3 px-5">
        <h3 class="m-auto mt-2 mb-4 text-danger">Login</h3>
        <div class="mb-4">
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="mb-4">
            <input type="password" class="form-control" id="password" placeholder="password">
        </div>
        <div class="mb-4 m-auto">
            <button type="submit" class="btn bg-success text-light" onclick="login()">Login</button>
        </div>
        <div class="mb-4 m-auto">
            <p>Don't have an account? <a href="{{route('regester.view')}}">Create account</a></p>
        </div>
    </div>
</div>

<script>
    async function login () {
        let msg = '';
        let email = document.querySelector("#email").value;
        let password = document.querySelector("#password").value;

        showLoader();
        let res = await axios.post("/admin/userLogin", {
            "email" : email,
            "password" : password,
        });
        hideLoader();

        if(res.data['status']==="Success") {
            msg = res.data['message'];
            showPopUp(msg);
            window.location.href = "/admin/home"
        } else {
            msg = res.data['message'];
            showPopUp(msg);
        }
    }
</script>