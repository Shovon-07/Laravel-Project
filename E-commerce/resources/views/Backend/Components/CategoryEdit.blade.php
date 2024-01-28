<div class="popup hidePopUp">
    <div>
        <input type="hidden" class="deleteAbleItem">
        <input class="categoryInput" type="text" id="categoryName" placeholder="Category name">
    </div>
    <button id="closePopUp" onclick="editeCategory()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    // window.addEventListener('load', () => {
    //     categoryList();
    // });

    // async function categoryList() {
    //     showLoader();
    //     const response = await axios.get("/admin/category-list");
    //     hideLoader();

    //     const data = response.data['categories'];
    //     document.querySelector("#categoryName").value = data;
    // }

    async function editeCategory() {
        const categoryId = document.querySelector("#categoryId").value;
        const categoryName = document.querySelector("#categoryName").value;

        if(categoryName.length === 0) {
            showTost("Please enter category name");
        } else {
            showLoader();
            const response = await axios.post("/admin/category-edite", {'categoryId':categoryId,'categoryName':categoryName});
            hideLoader();
            document.querySelector("#categoryName").value = "";
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