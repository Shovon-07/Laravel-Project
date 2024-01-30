<div class="popup hidePopUp" id="createBrandPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px;margin-bottom:20px">
        <h2>Create brand</h2>
    </div>

    <div>
        <input type="hidden" class="categoryIdForBrnad">
        <input type="text" class="addItemsInput" id="brandName" placeholder="Brand name">
    </div>
    <button id="closePopUp" onclick="createBrand()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function createBrand() {
        const categoryIdForBrnad = $(".categoryIdForBrnad").val();
        const brandName = $("#brandName").val();

        if(categoryIdForBrnad.length === 0) {
            showTost("Category not selected !");
        } else if(brandName.length === 0) {
            showTost("Please enter brand name");
        } else {
            showLoader();
            const response = await axios.post("/admin/create-brands",{'categoryId':categoryIdForBrnad,'brandName':brandName});
            hideLoader();
            $("#brandName").val("");
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                closePopUp();
                brandList();
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script>