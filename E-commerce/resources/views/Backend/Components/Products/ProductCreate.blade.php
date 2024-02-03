<div class="popup hidePopUp largePopUp" id="productCreatePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px;margin:30px 0 20px 0">
        <h2>Create product</h2>
    </div>

    <div class="d-flex" style="justify-content: space-around;width:100%;margin:10px 0 20px 0;">
        <div>
            <select id="selectCategoryForProduct" class="selectField" onchange="getCategoryOptionsValue()">
                <option selected>Select category</option>
                {{-- <option value="">Select category</option>
                <option value="">Category 1</option>
                <option value="">Category 2</option>
                <option value="">Category 3</option> --}}
            </select>
        </div>

        <div>
            <select id="selectBrandForProduct" class="selectField" onchange="getBrandOptionsValue()">
                <option selected>Select brand</option>
                {{-- <option value="">Select category</option>
                <option value="">Brand 1</option>
                <option value="">Brand 2</option>
                <option value="">Brand 3</option> --}}
            </select>
        </div>
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
        <input oninput="imgPreview.src=window.URL.createObjectURL(this.files[0])" type="file" id="files" class="productImgForSave" required style="visibility:hidden;">
    </div>
    <div>
        <textarea type="text" class="addItemsInput" id="productDescription" rows="5" cols="46" placeholder="Product description"></textarea>
    </div>
    <button id="closePopUp" onclick="createProduct()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>


<script>
    let categoryIdForProduct = "";
    let brandIdForProduct = "";

    window.addEventListener('load', () => {
        categoryListForProduct();
        brandListForProduct();
    });

    async function categoryListForProduct() {
        const response = await axios.get("/admin/category-list");
        let selectCategoryForProduct = $('#selectCategoryForProduct');

        response.data.forEach((items) => {
            let row = 
            `
                <option value="${items['id']}">${items['CategoryName']}</option>
            `;

            selectCategoryForProduct.append(row);
        });
    }

    async function brandListForProduct() {
        const response = await axios.get("/admin/brand-list");
        let selectBrandForProduct = $('#selectBrandForProduct');
        // selectBrandForProduct.empty();

        response.data.forEach((items) => {
            let row = 
            `
                <option value="${items['id']}">${items['BrandName']}</option>
            `;

            selectBrandForProduct.append(row);
        });
    }

    function getCategoryOptionsValue() {
        categoryIdForProduct = $("#selectCategoryForProduct").val();
        // brandListForProduct();
        console.log(categoryIdForProduct);
    }

    function getBrandOptionsValue() {
        brandIdForProduct = $("#selectBrandForProduct").val();
        // productList();
        console.log(brandIdForProduct);
    }

    async function createProduct() {
        // categoryIdForProduct = $(".categoryIdForProduct").val();
        // brandIdForProduct = $(".brandIdForProduct").val();

        const productName = $("#productName").val();
        const productTitle = $("#productTitle").val();
        const productPrice = $("#productPrice").val();
        const productStock = $("#productStock").val();
        const productDescription = $("#productDescription").val();
        const productImgForSave = document.querySelector(".productImgForSave").files[0];

        if(categoryIdForProduct.length === 0) {
            errorTost("Category not selected !");
        } else if(brandIdForProduct.length === 0) {
            errorTost("Brand not selected !");
        } else if(productName.length === 0) {
            errorTost("Please enter product name");
        } else if(productTitle.length === 0) {
            errorTost("Please enter product title");
        } else if(productPrice.length === 0) {
            errorTost("Please enter product price");
        } else if(productStock.length === 0) {
            errorTost("Please enter product stock");
        } else if(productImgForSave == null) {
            errorTost("No image selected");
        } else if(productDescription.length === 0) {
            errorTost("Please enter product description");
        } else {
            // console.log(categoryIdForProduct + " " + brandIdForProduct);
            let formData = new FormData();
            formData.append('productName', productName);
            formData.append('productTitle', productTitle);
            formData.append('productPrice', productPrice);
            formData.append('productStock', productStock);
            formData.append('productImg', productImgForSave);
            formData.append('productDescription', productDescription);
            formData.append('categoryId', categoryIdForProduct);
            formData.append('brandId', brandIdForProduct);

            const config = {
                headers : {
                    'content-type' : 'multipart/form-data'
                }
            }

            showLoader();
            const response = await axios.post("/admin/product-create",formData,config);
            hideLoader();
            $("#productName").val("");
            $("#productTitle").val("");
            $("#productPrice").val("");
            $("#productStock").val("");
            $("#productDescription").val("");

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