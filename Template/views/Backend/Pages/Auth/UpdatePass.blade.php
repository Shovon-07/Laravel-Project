@extends('Backend.Layouts.Links')
<title>Update Password</title>
{{-- Icon --}}
<link rel="icon" href="{{asset('Uploaded_file/Img/user.png')}}">

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">UPDATE PASSWORD</h3>
        <hr>
        <div>
            <label for="password">New password :</label> <br>
            <input type="password" id="password" placeholder="Enter new password">
        </div>
        <div>
            <label for="c_password">Confirm password :</label> <br>
            <input type="password" id="c_password" placeholder="Retype password">
        </div>
        <div class="buttonDiv">
            <button type="submit" class="button" onclick="confirmPass()">CONFIRM</button>
        </div>
    </div>
</div>

<script>
    async function confirmPass() {
        const password = document.querySelector("#password").value;
        const c_password = document.querySelector("#c_password").value;

        if(password <= 0) {
            showTost("Please enter password");
        } else if(password !== c_password) {
            showTost("Password not matched");
        } else {
            showLoader();
            const response = await axios.post("/admin/update-password", {"password" : password});
            hideLoader();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                setTimeout(() => {
                    window.location.href = '/admin/dashboard';
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>