<div class="popup hidePopUp" id="productEditPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Edit !</h2>
    </div>
    <div>
        <div class="d-flex">
            <div>
                <div style="margin: 20px 0">
                    <input type="hidden" class="editAbleProduct">
                    <input type="hidden" class="editAbleProductsCategory">
                    <input type="hidden" class="editAbleProductsBrand">
                </div>
                <div style="margin: 20px 0">
                    <input type="text" class="addItemsInput productName" placeholder="Product name">
                </div>
                <div style="margin: 20px 0">
                    <input type="text" class="addItemsInput productTitle" placeholder="Product title">
                </div>
            </div>
            <div>
                <div style="margin: 20px 0 20px 20px">
                    <input type="text" class="addItemsInput productPrice" placeholder="Product price">
                </div>
                <div style="margin: 20px 0 20px 20px">
                    <input type="text" class="addItemsInput productStock" placeholder="Product stock">
                </div>
            </div>
        </div>
        <div>
            <textarea type="text" class="addItemsInput productDescription" rows="5" cols="46" placeholder="Product description"></textarea>
        </div>

    </div>
    <button id="closePopUp" onclick="editProduct()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function editProduct() {
        const productIdForEdit = $('.editAbleProduct').val();
        const editAbleProductsCategory = $('.editAbleProductsCategory').val();
        const editAbleProductsBrand = $('.editAbleProductsBrand').val();

        const productNameForEdit = $(".productName").val();
        const productTitleForEdit = $(".productTitle").val();
        const productPriceForEdit = $(".productPrice").val();
        const productStockForEdit = $(".productStock").val();
        const productDescriptionForEdit = $(".productDescription").val();

        if(editAbleProductsCategory.length === 0) {
            showTost("Category not selected !");
        } else if(editAbleProductsBrand.length === 0) {
            showTost("Brand not selected !");
        } else if(productNameForEdit.length === 0) {
            showTost("Please enter product name");
        } else if(productTitleForEdit.length === 0) {
            showTost("Please enter product title");
        } else if(productPriceForEdit.length === 0) {
            showTost("Please enter product price");
        } else if(productStockForEdit.length === 0) {
            showTost("Please enter product stock");
        } else if(productDescriptionForEdit.length === 0) {
            showTost("Please enter product description");
        } else {
            showLoader();
            const response = await axios.post("/admin/product-edite", {
                'productId':productIdForEdit,
                'categoryId':editAbleProductsCategory,
                'brandId':editAbleProductsBrand,
                'productName':productNameForEdit,
                'productTitle':productTitleForEdit,
                'productDescription':productDescriptionForEdit,
                'productPrice':productPriceForEdit,
                'productStock':productStockForEdit
            });
            hideLoader();
            $(".productName").val("");
            $(".productTitle").val("");
            $(".productPrice").val("");
            $(".productStock").val("");
            $(".productDescription").val("");
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                productList();
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script>