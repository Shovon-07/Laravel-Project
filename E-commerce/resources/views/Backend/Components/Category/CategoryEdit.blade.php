<div class="popup hidePopUp" id="categoryEditPopUp">
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
    async function fillCategoryEditForm(id) {
        // let categoryIdForEdit = $(".editAbleCategory").val();
        const response = await axios.post("/admin/category-by-id", {
            'categoryId': id,
        });

        $("#categoryNameForEdit").val(response.data['CategoryName']);
    }

    async function editCategory() {
        let categoryIdForEdit = $(".editAbleCategory").val();
        let categoryNameForEdit = $("#categoryNameForEdit").val();

        if(categoryIdForEdit.length === 0) {
            errorTost("Category id not found");
        } else if(categoryNameForEdit.length === 0) {
            errorTost("Please enter category name");
        } else {
            showLoader();
            const response = await axios.post("/admin/category-edit", {
                'categoryId': categoryIdForEdit,
                'categoryName': categoryNameForEdit
            });
            hideLoader();
            $("#categoryNameForEdit").val("");

            if(response.data['status'] === 1) {
                successTost(response.data['message']);
                closePopUp();
                categoryList();
            } else {
                errorTost(response.data['message'])
            }
        }
    }
</script>