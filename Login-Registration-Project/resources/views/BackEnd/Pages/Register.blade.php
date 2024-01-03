@extends('BackEnd.Layouts.Links')
<title>Registration</title>

{{-- <!--=== Loader ===--> --}}
@include('BackEnd.Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('BackEnd.Components.PopUp')

{{-- <!--=== Registration Form ===--> --}}
<div class="login-container">
    <div class="card w-50 m-auto pt-3 px-5">
        <h3 class="m-auto mt-2 mb-4 text-danger">Create Account</h3>
        <div class="mb-4">
            <input type="text" class="form-control" id="name" placeholder="Enter name">
        </div>
        <div class="mb-4">
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="mb-4">
            <input type="password" class="form-control" id="password" placeholder="password">
        </div>
        <div class="mb-4 m-auto">
            <button type="submit" class="btn bg-success text-light" onclick="save()">Create</button>
        </div>
        <div class="mb-4 m-auto">
            <p>Already have an account? <a href="{{route('login.view')}}">Login</a></p>
        </div>
    </div>
</div>

<script>
    async function save() {
        let msg = '';
        let name = document.querySelector('#name').value;
        let email = document.querySelector('#email').value;
        let password = document.querySelector('#password').value;

        let data = {
            "name" : name,
            "email" : email,
            "password" : password
        };

        showLoader();
        let res = await axios.post("/admin/userRegistration", data);
        hideLoader();

        if(res.data['status']==='Success') {
            msg = res.data['message'];
            showPopUp(msg);
            window.location.href="/admin/"
        } else {
            msg = res.data['message'];
            showPopUp(msg);
        }
    }
</script>