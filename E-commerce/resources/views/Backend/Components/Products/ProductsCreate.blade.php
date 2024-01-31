<div class="popup hidePopUp" id="productCreatePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px;margin-bottom:20px">
        <h2>Create product</h2>
    </div>

    <div class="d-flex">
        <div>
            <div style="margin: 20px 0">
                <input type="hidden" class="categoryIdForProduct">
                <input type="hidden" class="brandIdForProduct">
            </div>
            <div style="margin: 20px 0">
                <input type="text" class="addItemsInput" id="productName" placeholder="Product name">
            </div>
            <div style="margin: 20px 0">
                <input type="text" class="addItemsInput" id="productTitle" placeholder="Product title">
            </div>
        </div>
        <div>
            <div style="margin: 20px 0 20px 20px">
                <input type="text" class="addItemsInput" id="productPrice" placeholder="Product price">
            </div>
            <div style="margin: 20px 0 20px 20px">
                <input type="text" class="addItemsInput" id="productStock" placeholder="Product stock">
            </div>
        </div>
    </div>
    <div>
        <textarea type="text" class="addItemsInput" id="productDescription" rows="5" cols="46" placeholder="Product description"></textarea>
    </div>
    <button id="closePopUp" onclick="createProduct()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>


<script>
    async function createProduct() {
        const categoryIdForProduct = $(".categoryIdForProduct").val();
        const brandIdForProduct = $(".brandIdForProduct").val();

        const productName = $("#productName").val();
        const productTitle = $("#productTitle").val();
        const productPrice = $("#productPrice").val();
        const productStock = $("#productStock").val();
        const productDescription = $("#productDescription").val();

        if(categoryIdForProduct.length === 0) {
            showTost("Category not selected !");
        } else if(brandIdForProduct.length === 0) {
            showTost("Brand not selected !");
        } else if(productName.length === 0) {
            showTost("Please enter product name");
        } else if(productTitle.length === 0) {
            showTost("Please enter product title");
        } else if(productPrice.length === 0) {
            showTost("Please enter product price");
        } else if(productStock.length === 0) {
            showTost("Please enter product stock");
        } else if(productDescription.length === 0) {
            showTost("Please enter product description");
        } else {
            showLoader();
            const response = await axios.post("/admin/product-create",{
                'categoryId':categoryIdForProduct,
                'brandId':brandIdForProduct,
                'productName':productName,
                'productTitle':productTitle,
                'productDescription':productDescription,
                'productPrice':productPrice,
                'productStock':productStock
            });
            hideLoader();
            $("#productName").val("");
            $("#productTitle").val("");
            $("#productPrice").val("");
            $("#productStock").val("");
            $("#productDescription").val("");
            closePopUp();

            if(response.data['status'] === 'success') {
                showTost(response.data['message']);
                closePopUp();
                productList();
            } else {
                showTost(response.data['message'])
            }
        }
    }
</script>