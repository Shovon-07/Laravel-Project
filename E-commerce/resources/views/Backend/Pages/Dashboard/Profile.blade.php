@extends('Backend.Layouts.Links')
<title>update profile</title>

{{-- <!--=== Loader ===--> --}}
@include('Backend.Components.Loader')

{{-- <!--=== Popup ===--> --}}
{{-- @include('Backend.Components.Popup') --}}

{{-- <!--=== Login form ===--> --}}
<div class="form-container d-flex" style="margin: 50px 0">
    {{-- <img class="userImg" id="userImg" alt="profile pic"> --}}
    <div class="form">
        <h4 class="title">PROFILE</h4>
        <div class="userImgContainer overlay" onclick="showPopUp()">
            <img src="{{asset('Uploaded_file/images/avater.png')}}" class="userImg" id="userImg" alt="profile pic">
            <i class="fa-solid fa-share-from-square shareIcon"></i>
        </div>
        <div class="d-flex">
            <div class="left">
                <div>
                    <input type="text" id="firstName" placeholder="Enter your first name">
                </div>
                <div>
                    <input type="email" readonly id="email" placeholder="Enter your email address">
                </div>
                <div>
                    <input type="text" id="address" placeholder="Enter your address">
                </div>
            </div>
            <div class="right">
                <div>
                    <input type="text" id="lastName" placeholder="Enter your last name">
                </div>
                <div>
                    <input type="number" readonly id="mobile" placeholder="Enter your mobile number">
                </div>
                <div>
                    <input type="password" id="password" autocomplete="off" placeholder="Enter your password">
                </div>
            </div>
        </div>
        <div class="buttonDiv">
            <button type="submit" class="button" onclick="updateProfile()">UPDATE</button>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', () => {
        userData();
    });

    async function userData() {
        showLoader();
        const response = await axios.get("/admin/profile-data");
        hideLoader();

        if(response.data['status'] === 'success') {
            const userData = response.data['data'];
            console.log(userData);
        } else {
            console.log("Oops !");
        }
    }
</script>

{{-- <script>
    window.addEventListener('load', () => {
        getData();
    });
    
    async function getData() {
        showLoader();
        const response = await axios.get("/admin/profile-data");
        hideLoader();

        if(response.data['status'] === 'success') {
            userData = response.data['data'];
            
            document.querySelector("#firstName").value = userData['firstName'];
            document.querySelector("#lastName").value = userData['lastName'];
            document.querySelector("#email").value = userData['email'];
            document.querySelector("#mobile").value = userData['mobile'];
            document.querySelector("#address").value = userData['address'];
            document.querySelector("#password").value = userData['password'];

            const img = userData['Img'];
            let imgPath = "{{asset('Uploaded_file/Img')}}" + `/${img}`;
            document.querySelector("#userImg").src = imgPath;
        } else {
            response.data['message'];
        }
    }

    async function updateProfile() {
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
        } else if(address <= 0) {
            showTost("Please enter your address");
        } else if(password <= 0) {
            showTost("Please enter a strong password");
        } else {
            showLoader();
            const response = await axios.post("/admin/update-profile",{
                "firstName": firstName,
                "lastName": lastName,
                "address": address,
                "password": password
            });
            hideLoader();
            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                getData();
            } else {
                showTost(response.data['message']);
            }
        }
    }

    // document.querySelector('.userImgContainer').addEventListener("click", () => {
    //     alert("userImgContainer");
    // })
</script> --}}