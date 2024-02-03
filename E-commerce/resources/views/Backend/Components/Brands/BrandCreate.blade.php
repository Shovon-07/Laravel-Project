<div class="popup hidePopUp" id="createBrandPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px;margin-bottom:20px">
        <h2>Create brand</h2>
    </div>

    <div>
        <input type="text" class="addItemsInput" id="brandName" placeholder="Brand name">
    </div>
    <button id="closePopUp" onclick="createBrand()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function createBrand() {
        const brandName = $("#brandName").val();

        if(brandName.length === 0) {
            errorTost("Please enter brand name");
        } else {
            showLoader();
            const response = await axios.post("/admin/brand-create",{'brandName':brandName});
            hideLoader();
            $("#brandName").val("");

            if(response.data['status'] === 1) {
                successTost(response.data['message']);
                closePopUp();
                brandList();
            } else {
                errorTost(response.data['message'])
            }
        }
    }
</script>