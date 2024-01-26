<div class="popup hidePopUp" id="deleteCategoryPopUp">
    <div style="color:yellow; font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        {{-- <p class="deleteCategoryMsg"></p> --}}
        <input type="hidden" class="deleteCategoryMsg">
    </div>
    <button id="closePopUp" onclick="deleteCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteCategory() {
        const id = $('.deleteCategoryMsg').val();
        showLoader();
        const response = await axios.post("/admin/delete-category", {'categoryId':id});
        hideLoader();

        if(response.data['status'] === 'success') {
            showTost(response.data['message']);
            closePopUp();
            getData();
        } else {
            showTost(response.data['message']);
        }
    }
</script>