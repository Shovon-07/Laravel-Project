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
            <div class="userImgContainer overlay" onclick="showPopUp()">
                <img class="userImg" id="userImg">
                <i class="fa-solid fa-share-from-square shareIcon"></i>
            </div>
                    <div>
                        <input type="text" id="name" placeholder="User name">
                    </div>
                    <div>
                        <input type="email" readonly id="email" placeholder="User email">
                    </div>
                    <div>
                        <input type="password" id="password" autocomplete="off" placeholder="Password">
                    </div>
            <div class="buttonDiv">
                <button type="submit" class="button" onclick="updateProfile()">UPDATE</button>
            </div>
        </div>
    </div>

    <script>
        let name = document.querySelector("#name");
        let email = document.querySelector("#email");
        let password = document.querySelector("#password");

        window.addEventListener('load', () => {
            userData();
        });

        async function userData() {
            showLoader();
            const response = await axios.get("/admin/profile-data");
            hideLoader();

            if(response.data['status'] === 'success') {
                const userData = response.data['data'];

                // View user details
                name.value = userData['Name'];
                email.value = userData['Email'];
                password.value = userData['Password'];

                // View profile pic
                const dbImg = userData['Img'];
                const imgPath = "{{asset('Uploaded_file/images/users')}}" + `/${dbImg}`;
                document.querySelector("#userImg").src = imgPath;
            } else {
                console.log("Oops !");
            }
        }

        async function updateProfile() {
            const name = document.querySelector("#name").value;
            const email = document.querySelector("#email").value;
            const password = document.querySelector("#password").value;

            if(name.length === 0) {
                showTost("Please enter your name");
            } else if(email.length === 0) {
                showTost("Please enter your email address");
            } else if(password.length < 3) {
                showTost("Please enter a strong password minimum 3 cherecter");
            } else {
                showLoader();
                const config = { headers: { 'Content-Type': 'multipart/form-data' } };
                const response = await axios.post("/admin/update-profile", {"name":name, "password":password, config});
                hideLoader();

                if(response.data['status'] === 'success') {
                    showTost(response.data['message']);
                    hidePopUp();
                    userData();
                } else {
                    showTost(response.data['message']);
                }
            }
        }
    </script>
@endsection

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