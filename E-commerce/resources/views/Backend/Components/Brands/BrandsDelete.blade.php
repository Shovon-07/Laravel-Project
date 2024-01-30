<div class="popup hidePopUp" id="deletePopUp">
    <div style="color:yellow; font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        {{-- <p class="deleteCategoryMsg"></p> --}}
        <input type="text" class="deleteAbleItem">
    </div>
    <button id="closePopUp" onclick="deleteItem()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteItem() {
        const id = $('.deleteAbleItem').val();
        showLoader();
        const response = await axios.post("/admin/category-delete", {'categoryId':id});
        hideLoader();

        if(response.data['status'] === 'success') {
            showTost(response.data['message']);
            closePopUp();
            categoryList();
        } else {
            showTost(response.data['message']);
        }
    }
</script>