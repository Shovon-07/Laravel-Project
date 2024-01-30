<div class="popup hidePopUp" id="editPopUp">
    <div style="color:yellow; font-size:20px">
        <h2>Edit !</h2>
    </div>
    <div>
        <input type="hidden" class="editAbleItem">
        <input class="categoryInput categoryName" type="text" placeholder="Category name" style="margin-top: 20px">
    </div>
    <button id="closePopUp" onclick="editCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function editCategory() {
        let categoryId = document.querySelector(".editAbleItem").value;
        let categoryName = document.querySelector(".categoryName").value;

        if(categoryName.length === 0) {
            showTost("Please enter category name");
        } else {
            showLoader();
            const response = await axios.post("/admin/category-edite", {'categoryId': categoryId,'categoryName':categoryName});
            hideLoader();
            document.querySelector(".categoryName").value = "";
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                categoryList();
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script>