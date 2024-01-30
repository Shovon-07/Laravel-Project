<div class="popup hidePopUp">
    <div>
        <input class="categoryInput" type="text" id="categoryName" placeholder="Category name">
    </div>
    <button id="closePopUp" onclick="createCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function createCategory() {
        const categoryName = document.querySelector("#categoryName").value;

        if(categoryName.length === 0) {
            showTost("Please enter category name");
        } else {
            showLoader();
            const response = await axios.post("/admin/create-category", {'categoryName':categoryName});
            hideLoader();
            document.querySelector("#categoryName").value = "";
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                categoryList()
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script>