{{-- <div class="popup hidePopUp" id="categoryCreatePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px;margin-bottom:20px">
        <h2>Create category</h2>
    </div>
    <div>
        <input class="addItemsInput" type="text" id="categoryName" placeholder="Category name">
    </div>
    <button id="closePopUp" onclick="createCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function createCategory() {
        const categoryName = $("#categoryName").val();

        if(categoryName.length === 0) {
            showTost("Please enter category name");
        } else {
            showLoader();
            const response = await axios.post("/admin/create-category", {'categoryName':categoryName});
            hideLoader();
            $("#categoryName").val("");
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