<div class="popup hidePopUp" id="brandEditPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        {{-- <p class="deleteCategoryMsg"></p> --}}
        <input type="text" class="deleteAbleBrand">
    </div>
    <button id="closePopUp" onclick="deleteBrand()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteBrand() {
        const brandID = $('.deleteAbleBrand').val();
        showLoader();
        const response = await axios.post("/admin/brands-delete", {'brandID':brandID});
        hideLoader();

        if(response.data['status'] === 'success') {
            showTost(response.data['message']);
            closePopUp();
            brandList();
        } else {
            showTost(response.data['message']);
        }
    }
</script>