<div class="popup hidePopUp largePopUp" id="productEditPopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px;margin-bottom:20px">
        <h2>Edit !</h2>
    </div>
    <div>

    <div class="d-flex">
        <div>
            <div>
                <input type="text" class="productIdForEdit">
                <input type="text" class="imgPathForEdit">
            </div> 
            <div style="margin: 20px 0">
                <input type="text" class="addItemsInput" id="productNameForEdit" placeholder="Product name">
            </div>
            <div style="margin: 20px 0">
                <input type="text" class="addItemsInput" id="productTitleForEdit" placeholder="Product title">
            </div>
        </div>
        <div>
            <div style="margin: 20px 0 20px 20px">
                <input type="text" class="addItemsInput" id="productPriceForEdit" placeholder="Product price">
            </div>
            <div style="margin: 20px 0 20px 20px">
                <input type="text" class="addItemsInput" id="productStockForEdit" placeholder="Product stock">
            </div>
        </div>
    </div>
    <div>
        <span class="imgPreviewParent">
            <img src="{{asset('assets/backend/images/user.png')}}" id="imgPreview" style="width: 20%;height:70px">
        </span>
        <label for="files" class="selectImg">Select Image</label> <br>
        <input oninput="imgPreview.src=window.URL.createObjectURL(this.files[0])" type="file" id="files" class="productImgForEdit" required style="visibility:hidden;">
    </div>
    <div>
        <textarea type="text" class="addItemsInput" id="productDescriptionForEdit" rows="5" cols="46" placeholder="Product description"></textarea>
    </div>
    <button id="closePopUp" onclick="editProduct()" style="margin-bottom:20px">CONFIRM</button> <br>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>


<script>

    window.addEventListener('load', () => {
        // categoryListForProduct();
        // brandListForProduct();
    });

    async function fillProductEditForm(id) {
        // let categoryIdForEdit = $(".editAbleCategory").val();
        const response = await axios.post("/admin/product-by-id", {
            'productId': id,
        });

        // const imgPath = "{{asset('Uploaded_file')}}";
        // let imgTag = $(".imgPreviewParent");
        // imgTag.append(`<img class="productImg" src="${imgPath}/${response.data['ProductImg']}">`)

        console.log(response.data['ProductImg']);

        $("#productNameForEdit").val(response.data['ProductName']);
        $("#productTitleForEdit").val(response.data['ProductTitle']);
        $("#productPriceForEdit").val(response.data['ProductPrice']);
        $("#productStockForEdit").val(response.data['ProductStock']);
        $("#productDescriptionForEdit").val(response.data['ProductDescription']);

        // $("#categoryNameForEdit").val(response.data['CategoryName']);
    }

    async function editProduct() {
        const productIdForEdit = $(".productIdForEdit").val();
        const productNameForEdit = $("#productNameForEdit").val();
        const productTitleForEdit = $("#productTitleForEdit").val();
        const productPriceForEdit = $("#productPriceForEdit").val();
        const productStockForEdit = $("#productStockForEdit").val();
        const productDescriptionForEdit = $("#productDescriptionForEdit").val();
        const productImgForEdit = document.querySelector(".productImgForEdit").files[0];
        const imgPathForEdit = $(".imgPathForEdit").val();

        if(productNameForEdit.length === 0) {
            errorTost("Please enter product name");
        } else if(productTitleForEdit.length === 0) {
            errorTost("Please enter product title");
        } else if(productPriceForEdit.length === 0) {
            errorTost("Please enter product price");
        } else if(productStockForEdit.length === 0) {
            errorTost("Please enter product stock");
        } else if(productDescriptionForEdit.length === 0) {
            errorTost("Please enter product description");
        } else {
            let formData = new FormData();
            formData.append('productId', productIdForEdit);
            formData.append('productName', productNameForEdit);
            formData.append('productTitle', productTitleForEdit);
            formData.append('productPrice', productPriceForEdit);
            formData.append('productStock', productStockForEdit);
            formData.append('productDescription', productDescriptionForEdit);
            formData.append('productImg', productImgForEdit);
            formData.append('imgPathForEdit', imgPathForEdit);

            const config = {
                headers : {
                    'content-type' : 'multipart/form-data'
                }
            }

            showLoader();
            const response = await axios.post("/admin/product-edite",formData,config);
            hideLoader();
            $("#productNameForEdit").val("");
            $("#productTitleForEdit").val("");
            $("#productPriceForEdit").val("");
            $("#productStockForEdit").val("");
            $("#productDescriptionForEdit").val("");

            if(response.data['status'] === 1) {
                successTost(response.data['message']);
                closePopUp();
                productList();
            } else {
                errorTost(response.data['message'])
            }
        }
    }
</script>