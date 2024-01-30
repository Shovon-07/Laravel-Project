<div class="popup hidePopUp" id="createBrandPopUp">
    <div>
        <input type="text" class="categoryIdForBrnad">
        <input class="categoryInput" type="text" id="brandName" placeholder="Brand name">
    </div>
    <button id="closePopUp" onclick="createBrand()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function createBrand() {
        const categoryIdForBrnad = document.querySelector("#categoryIdForBrnad").value;
        const brandName = document.querySelector("#brandName").value;

        if(brandName.length === 0) {
            showTost("Please enter brand name");
        } else {
            showLoader();
            const response = await axios.post("/admin/create-brands",{'categoryIdForBrnad':createAbleItemsId,'brandName':brandName});
            hideLoader();
            document.querySelector("#categoryName").value = "";
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                categoryList();
                closePopUp();
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script>