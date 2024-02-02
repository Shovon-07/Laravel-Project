@extends('Backend.Layouts.Links')
<title>update profile</title>

@section('content')
    {{-- <!--=== Popup ===--> --}}
    @include('Backend.Components.ChangeProfilePicPopup')

    {{-- <!--=== Login form ===--> --}}
    <div class="form-container d-flex" style="margin: 50px 0">
        {{-- <img class="userImg" id="userImg" alt="profile pic"> --}}
        <div class="form">
            <h4 class="title">PROFILE</h4>
            <div class="userImgContainer overlay" onclick="changeProfilePicPopUp(prevUserImg)">
                <span id="imgParent">
                    {{-- <img class="userImg" id="userImg"> --}}
                </span>
                <i class="fa-solid fa-share-from-square shareIcon"></i>
            </div>
            <div>
                <input type="text" id="name" placeholder="User name">
            </div>
            <div>
                <input type="email" readonly id="email" placeholder="User email">
            </div>
            <div>
                <input type="number" id="mobile" placeholder="Phone number">
            </div>
            <div>
                <input type="password" readonly id="password" autocomplete="off" placeholder="Password">
            </div>
            <div class="buttonDiv">
                <button type="submit" class="button" onclick="updateProfile()">UPDATE</button>
            </div>
        </div>
    </div>

    <script>
        let prevUserImg = [];

        window.addEventListener('load', () => {
            profileData();
        });

        async function profileData() {
            showLoader();
            const response = await axios.get("/admin/profile-data");
            hideLoader();

            if(response.data['status'] === 1) {
                const data = response.data['data'];

                // Show value
                $("#name").val(data['Name']);
                $("#email").val(data['Email']);
                $("#mobile").val(data['Mobile']);
                $("#password").val(data['Password']);
                prevUserImg.push(data['Img']);

                // Show profile pic
                let imgPath = "{{asset('Uploaded_file')}}" + `/${data['Img']}`;
                let img = $(`<img class="userImg" id="userImg">`);
                img.attr('src',imgPath);
                img.appendTo("#imgParent");
                
            } else {
                response.data['message'];
            }
        }

        async function updateProfile() {
            const name = $("#name").val();
            const email = $("#email").val();
            const mobile = $("#mobile").val();
            const password = $("#password").val();

            if(name.length === 0) {
                showTost("Please enter your name");
            } else if(email.length === 0) {
                showTost("Please enter your email address");
            } else {
                showLoader();
                // const config = { headers: { 'Content-Type': 'multipart/form-data' } };
                const response = await axios.post("/admin/update-profile", {"name":name,"email":email,"mobile":mobile,"password":password});
                hideLoader();

                if(response.data['status'] === 'success') {
                    showTost(response.data['message']);
                    profileData();
                } else {
                    showTost(response.data['message']);
                }
            }
        }
    </script>
@endsection