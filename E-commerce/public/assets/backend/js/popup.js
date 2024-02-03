// let popup = document.querySelector(".popup");
// let popUpMsg = document.querySelector(".popUpMsg");

// function showPopUp(msg) {
//     popup.classList.remove("hidePopUp");
//     popUpMsg.innerHTML = msg;
//     // editAbleItem.value = msg;
// }

//___ Change Profile Pic start ___//
function changeProfilePicPopUp(prevUserImg) {
    $("#profilePicChengePopUp").removeClass("hidePopUp");
    $("#prevUserImg").val(prevUserImg);
}

//___ Change Profile Pic end ___//

//___ Brand section start ___//
function createBrandPopUp() {
    $("#createBrandPopUp").removeClass("hidePopUp");
}

function deleteBrandPopUp(id) {
    $("#brandDeletePopUp").removeClass("hidePopUp");
    $(".deleteAbleBrand").val(id);
}

function editBrandPopUp(id) {
    $("#brandEditPopUp").removeClass("hidePopUp");
    $(".editAbleBrand").val(id);
}
//___ Brand section end ___//

//___ Category section start ___//
function createCategoryPopUp() {
    $("#categoryCreatePopUp").removeClass("hidePopUp");
}

function deleteCategoryPopUp(id) {
    $("#categoryDeletePopUp").removeClass("hidePopUp");
    $(".deleteAbleCategory").val(id);
}

function editeCategoryPopUp(id) {
    $("#categoryEditPopUp").removeClass("hidePopUp");
    $(".editAbleCategory").val(id);
}

//___ Category section end ___//


//___ Product section start ___//
function createProductPopUp() {
    $("#productCreatePopUp").removeClass("hidePopUp");
}

function deleteProductPopUp(id, imgPath) {
    $("#productDeletePopUp").removeClass("hidePopUp");
    $(".productId").val(id);
    $(".imgPath").val(imgPath);
}

function editProductPopUp(id,imgPath) {
    $("#productEditPopUp").removeClass("hidePopUp");
    $(".productIdForEdit").val(id);
    $(".imgPathForEdit").val(imgPath);
}
//___ Product section end ___//


function hidePopUp() {
    $("#profilePicChengePopUp").addClass("hidePopUp");

    // popup.classList.add("hidePopUp");

    $("#createBrandPopUp").addClass("hidePopUp");
    $("#brandDeletePopUp").addClass("hidePopUp");
    $("#brandEditPopUp").addClass("hidePopUp");

    $("#categoryCreatePopUp").addClass("hidePopUp");
    $("#categoryDeletePopUp").addClass("hidePopUp");
    $("#categoryEditPopUp").addClass("hidePopUp");
    
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