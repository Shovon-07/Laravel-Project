<div class="popup hidePopUp">
    <div class="userImgContainer" onclick="showPopUp()">
        <img src="{{asset('Uploaded_file/Img/user.png')}}" class="userImg" id="userImg" alt="profile pic">
    </div>
    <div>
        <input type="file" id="updateProfilePic" placeholder="Choose profile pic">
    </div>
    <button onclick="updatePic()" id="closePopUp">CONFIRM</button>
    <a class="cancel" id="closePopUp">Cancel</a>
</div>

<script>
    // async function updatePic() {
    //     const updateProfilePic = document.querySelector("#updateProfilePic").value;
        
    //     showLoader();
    //     const response = await axios.post("/admin/update-profile",{
    //         "Img": updateProfilePic
    //     });
    //     hideLoader();
    // }
</script>