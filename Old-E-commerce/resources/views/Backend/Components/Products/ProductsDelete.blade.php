<div class="popup hidePopUp" id="productDeletePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        <input type="hidden" class="deleteAbleProduct">
        <input type="hidden" class="deleteAbleProductsCategory">
        <input type="hidden" class="deleteAbleProductsBrand">
    </div>
    <button id="closePopUp" onclick="deleteProduct()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteProduct() {
        const productId = $('.deleteAbleProduct').val();
        const deleteAbleProductsCategory = $('.deleteAbleProductsCategory').val();
        const deleteAbleProductsBrand = $('.deleteAbleProductsBrand').val();


        showLoader();
        const response = await axios.post("/admin/product-delete", {
            'productId':productId,
            'categoryId':deleteAbleProductsCategory,
            'brandId':deleteAbleProductsBrand
        });
        hideLoader();

        if(response.data['status'] === 'success') {
            showTost(response.data['message']);
            closePopUp();
            productList();
        } else {
            showTost(response.data['message']);
        }
    }
</script>