{{-- <div class="popup hidePopUp" id="categoryEditPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Edit !</h2>
    </div>
    <div>
        <input type="hidden" class="editAbleCategory">
        <input type="text" class="addItemsInput" id="categoryNameForEdit" style="margin-top: 20px" placeholder="Category name">
    </div>
    <button id="closePopUp" onclick="editCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function editCategory() {
        let categoryIdForEdit = $(".editAbleCategory").val();
        let categoryNameForEdit = $("#categoryNameForEdit").val();

        if(categoryNameForEdit.length === 0) {
            showTost("Please enter category name");
        } else {
            showLoader();
            const response = await axios.post("/admin/category-edite", {
                'categoryId': categoryIdForEdit,
                'categoryName': categoryNameForEdit
            });
            hideLoader();
            $("#categoryNameForEdit").val("");
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                categoryList();
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script> --}}