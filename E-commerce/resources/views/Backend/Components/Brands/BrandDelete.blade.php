<div class="popup hidePopUp" id="brandDeletePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        <input type="hidden" class="deleteAbleBrand">
    </div>
    <button id="closePopUp" onclick="deleteBrand()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteBrand() {
        const brandID = $('.deleteAbleBrand').val();
        showLoader();
        const response = await axios.post("/admin/brand-delete", {'brandID':brandID});
        hideLoader();

        if(response.data['status'] === 1) {
            successTost(response.data['message']);
            closePopUp();
            brandList();
        } else {
            errorTost(response.data['message']);
        }
    }
</script>