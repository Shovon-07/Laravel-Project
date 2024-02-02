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
        <img src="{{asset('assets/backend/images/user.png')}}" id="imgPreview" style="width: 25%;height:80px">
        <label for="files" class="selectImg">Select Image</label> <br>
        <input oninput="imgPreview.src=window.URL.createObjectURL(this.files[0])" type="file" id="files" class="productImg" required style="visibility:hidden;">
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
        const productImg = document.querySelector(".productImg").files[0];

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
        } else if(productImg == null) {
            showTost("Please enter product img");
        } else if(productDescription.length === 0) {
            showTost("Please enter product description");
        } else {
            let forData = new FormData();
            forData.append('productName', productName);
            forData.append('productTitle', productTitle);
            forData.append('productPrice', productPrice);
            forData.append('productStock', productStock);
            forData.append('', productImg);
            forData.append('productDescription', productDescription);

            const config = {
                headers : {
                    'content-type' : 'multipart/form-data'
                }
            }

            showLoader();
            // const response = await axios.post("/admin/product-create",{
            //     'categoryId':categoryIdForProduct,
            //     'brandId':brandIdForProduct,
            //     'productName':productName,
            //     'productTitle':productTitle,
            //     'productDescription':productDescription,
            //     'productPrice':productPrice,
            //     'productStock':productStock
            // });
            const response = await axios.post("/admin/product-create",FormData,config);
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