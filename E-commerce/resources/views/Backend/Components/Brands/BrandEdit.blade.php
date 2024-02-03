<div class="popup hidePopUp" id="brandEditPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Edit !</h2>
    </div>
    <div>
        <input type="hidden" class="editAbleBrand">
        <input type="text" class="addItemsInput" id="brandNameForEdit" style="margin-top: 20px" placeholder="Category name">
    </div>
    <button id="closePopUp" onclick="editBrand()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function fillBrandEditForm(id) {
        const response = await axios.post("/admin/brand-by-id", {
            'brandId': id,
        });

        $("#brandNameForEdit").val(response.data['BrandName']);
    }

    async function editBrand() {
        const brandIDForEdit = $(".editAbleBrand").val();
        const brandNameForEdit = $("#brandNameForEdit").val();

        if(brandNameForEdit.length === 0) {
            showTost("Please enter brand name");
        } else {
            showLoader();
            const response = await axios.post("/admin/brand-edite", {'brandID':brandIDForEdit,'brandName':brandNameForEdit});
            hideLoader();
            $("#brandNameForEdit").val("");

            if(response.data['status'] === 1) {
                successTost(response.data['message']);
                closePopUp();
                brandList();
            } else {
                errorTost(response.data['message']);
            }
        }
    }
</script>