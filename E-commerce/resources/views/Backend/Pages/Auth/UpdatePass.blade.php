@extends('Backend.Layouts.Links')
<title>Update Password</title>

@section('content')
    {{-- <!--=== Update password form ===--> --}}
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
                <button type="submit" class="button" onclick="updatePass()">CONFIRM</button>
            </div>
        </div>
    </div>

    <script>
        async function updatePass() {
            const email = getSessionData();
            const password = $("#password").val();
            const c_password = $("#c_password").val();

            if(password.length < 3) {
                showTost("Please enter a strong password minimum 3 cherecter");
            } else if(password.length > 6) {
                showTost("Please enter a strong password maximum 6 cherecter");
            } else if(password !== c_password) {
                showTost("Password not matched");
            } else {
                showLoader();
                const response = await axios.post("/admin/update-password", {"email":email,"password" : password});
                hideLoader();

                if(response.data['status'] === 'success') {
                    showTost(response.data['message']);
                    
                    sessionStorage.clear();
                    localStorage.clear();
                    
                    setTimeout(() => {
                        window.location.href = '/admin/';
                    }, 1000);
                } else {
                    showTost(response.data['message']);
                }
            }
        }
    </script>
@endsection