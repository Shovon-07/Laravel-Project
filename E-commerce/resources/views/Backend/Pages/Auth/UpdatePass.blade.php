@extends('Backend.Layouts.Links')
<title>Update Password</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Login form ===--> --}}
<div class="form-container">
    <div class="form">
        <h3 class="title">UPDATE PASSWORD</h3>
        <div>
            <input type="password" id="password" placeholder="Enter new password">
        </div>
        <div>
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

        if(password.length < 3) {
            showTost("Please enter a strong password up to 3 charecters");
        } else if(password !== c_password) {
            showTost("Password not matched");
        } else {
            showLoader();
            const email = getSessionStorage();
            const response = await axios.post("/admin/update-password", {"email" : email,"password" : password});
            hideLoader();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '/admin/';
                }, 1000);
            } else {
                showTost(response.data['message']);
            }
        }
    }
</script>