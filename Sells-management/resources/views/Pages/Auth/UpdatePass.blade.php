@extends('Layouts.Links')
<title>Update Password</title>

{{-- <!--=== Loader ===--> --}}
@include('Components.Loader')

{{-- <!--=== Pop Up ===--> --}}
@include('Components.PopUp')

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
            <button type="submit" onclick="confirmPass()">CONFIRM</button>
        </div>
    </div>
</div>

<script>
    async function confirmPass() {
        const password = document.querySelector("#password").value;
        const c_password = document.querySelector("#c_password").value;

        if(password.length === 0) {
            showTost("Please enter new password");
        } else if(c_password.length === 0) {
            showTost("Retype password");
        } else if(password != c_password) {
            showTost("Password & confirm password does not match");
        } else {
            showLoader();
            let res = await axios.post('/reset-password', {"password":password});
            hideLoader();

            if(res.data["status"] === 'success') {
                showTost(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/";
                }, 1000);
            } else {
                showTost(res.data['message']);
            }
        }
    }
</script>