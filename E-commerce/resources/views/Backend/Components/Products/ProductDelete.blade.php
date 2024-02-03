<div class="popup hidePopUp" id="productDeletePopUp">
    <div style="color:rgb(255, 187, 0); font-size:20px">
        <h2>Delete !</h2>
    </div>
    <div>
        <input type="hidden" class="productId">
        <input type="hidden" class="imgPath">
    </div>
    <button id="closePopUp" onclick="deleteProduct()">CONFIRM</button>
    <a class="cancel" id="closePopUp" onclick="closePopUp()">Cancel</a>
</div>

<script>
    async function deleteProduct() {
        const productId = $('.productId').val();
        const imgPath = $('.imgPath').val();

        showLoader();
        const response = await axios.post("/admin/product-delete", {
            'productId':productId,
            'imgPath':imgPath,
        });
        hideLoader();

        if(response.data['status'] === 1) {
            successTost(response.data['message']);
            closePopUp();
            productList();
        } else {
            errorTost(response.data['message']);
        }
    }
</script>