let popup = document.querySelector(".popup");
let popUpMsg = document.querySelector(".popUpMsg");

function showPopUp(msg) {
    popup.classList.remove("hidePopUp");
    popUpMsg.innerHTML = msg;
    // editAbleItem.value = msg;
}

//___ Category section start ___//
// Create category
function createCategoryPopUp() {
    $("#categoryCreatePopUp").removeClass("hidePopUp");
}

// Delete category
function deleteCategoryPopUp(id) {
    $("#categoryDeletePopUp").removeClass("hidePopUp");
    $(".deleteAbleCategory").val(id);
}

// Edit category
function editeCategoryPopUp(id) {
    $("#categoryEditPopUp").removeClass("hidePopUp");
    $(".editAbleCategory").val(id);
}

//___ Category section end ___//

//___ Brand section start ___//
// Create brand
function createBrandPopUp(id) {
    $("#createBrandPopUp").removeClass("hidePopUp");
    $(".categoryIdForBrnad").val(id);
}

// Delete brand
function deleteBrandPopUp(id) {
    $("#brandDeletePopUp").removeClass("hidePopUp");
    $(".deleteAbleBrand").val(id);
}

// Edit brand
function editBrandPopUp(id) {
    $("#brandEditPopUp").removeClass("hidePopUp");
    $(".editAbleBrand").val(id);
}
//___ Brand section end ___//

//___ Product section start ___//
function createProductPopUp(categoryId,brandId) {
    $("#productCreatePopUp").removeClass("hidePopUp");
    $(".categoryIdForProduct").val(categoryId);
    $(".brandIdForProduct").val(brandId);
    // console.log(categoryId + " " + brandId);
}

function deleteProductPopUp(id, categoryIdForProduct, brandIdForProduct) {
    $("#productDeletePopUp").removeClass("hidePopUp");
    $(".deleteAbleProduct").val(id);
    $(".deleteAbleProductsCategory").val(categoryIdForProduct);
    $(".deleteAbleProductsBrand").val(brandIdForProduct);
}

function editProductPopUp(id, categoryIdForProduct, brandIdForProduct) {
    $("#productEditPopUp").removeClass("hidePopUp");
    $(".editAbleProduct").val(id);
    $(".editAbleProductsCategory").val(categoryIdForProduct);
    $(".editAbleProductsBrand").val(brandIdForProduct);
}
//___ Product section end ___//


function hidePopUp() {
    popup.classList.add("hidePopUp");

    $("#categoryCreatePopUp").addClass("hidePopUp");
    $("#categoryDeletePopUp").addClass("hidePopUp");
    $("#categoryEditPopUp").addClass("hidePopUp");
    
    $("#createBrandPopUp").addClass("hidePopUp");
    $("#brandDeletePopUp").addClass("hidePopUp");
    $("#brandEditPopUp").addClass("hidePopUp");

    $("#productCreatePopUp").addClass("hidePopUp");
    $("#productDeletePopUp").addClass("hidePopUp");
    $("#productEditPopUp").addClass("hidePopUp");
}


function closePopUp() {
    hidePopUp();
}

// Close pop up when click esc btn
$(document).on('keydown', function(event) {
    if (event.key == "Escape") {
        hidePopUp();
    }
});