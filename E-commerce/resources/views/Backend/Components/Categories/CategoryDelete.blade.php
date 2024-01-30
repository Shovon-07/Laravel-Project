<div class="popup hidePopUp" id="categoryDeletePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        <input type="hidden" class="deleteAbleCategory">
    </div>
    <button id="closePopUp" onclick="deleteCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteCategory() {
        const categoryIdForDelete = $('.deleteAbleCategory').val();
        showLoader();
        const response = await axios.post("/admin/category-delete", {'categoryId':categoryIdForDelete});
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