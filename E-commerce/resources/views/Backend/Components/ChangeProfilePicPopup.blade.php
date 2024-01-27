<div class="popup hidePopUp">
    <div>
        <h3 style="margin-bottom:20px">Change profile pic</h3>
    </div>
    <div>
        <input type="file" id="updatePic" placeholder="Choose profile pic">
    </div>
    <button onclick="updatePic()">CONFIRM</button>
    <a class="cancel" id="closePopUp">Cancel</a>
</div>

<script>
    async function updatePic() {
        const updatePic = document.querySelector("#updatePic").value;
        
        console.log(updatePic);
        
        showLoader();
        const response = await axios.post("/admin/update-profile-pic",{
            "img": updatePic
        });
        hideLoader();

        if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                userData();
        } else {
            showTost(response.data['message']);
        }
    }
</script>