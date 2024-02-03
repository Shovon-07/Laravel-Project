<div class="popup hidePopUp" id="profilePicChengePopUp">
    <div>
        <h3 style="margin-bottom:30px;color:var(--dark-2)">Change profile pic</h3>
    </div>
    <div class="d-flex" style="flex-direction: column">
        <img id="selectedImg" src="{{asset('assets/backend/images/user.png')}}" style="width:27%;height:70px">
        
        <label for="files" class="selectImg">Select Image</label> <br>
        <input type="file" oninput="selectedImg.src=window.URL.createObjectURL(files[0])" id="files" class="img" required style="visibility:hidden;">
        
        <button type="submit" class="submitBtn" onclick="changeProfileImg()">CONFIRM</button>
    </div>
    <a class="cancel" onclick="closePopUp()">Cancel</a>
    <div>
        <input type="hidden" id="prevUserImg">
    </div>
</div>

<script>
    async function changeProfileImg() {
        const userImg = document.querySelector("#files").files[0];
        const prevUserImg = document.querySelector("#prevUserImg").value;

        if(userImg == null) {
            errorTost('No image selected');
        } else {
            let formData = new FormData();
            formData.append('userImg', userImg);
            formData.append('prevUserImg',prevUserImg);
            
            const config = {
                headers : {
                    'content-type' : 'multipart/form-data'
                }
            }

            showLoader();
            const response = await axios.post("/admin/update-profile-pic",formData,config);
            hideLoader();

            if(response.data['status'] === 1) {
                successTost(response.data['message']);
                closePopUp();
                // profileData();
            } else {
                errorTost(response.data['message']);
            }
        }        
    }
</script>