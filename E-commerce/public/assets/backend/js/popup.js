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
//___ Brand section end ___//


function hidePopUp() {
    popup.classList.add("hidePopUp");

    $("#categoryCreatePopUp").addClass("hidePopUp");
    $("#categoryDeletePopUp").addClass("hidePopUp");
    $("#categoryEditPopUp").addClass("hidePopUp");
    
    $("#createBrandPopUp").addClass("hidePopUp");
}

// let closePopUp = document.querySelectorAll("#closePopUp");
// closePopUp.forEach((item) => {
//     item.addEventListener("click", () => {
//         hidePopUp();
//     });
// });

function closePopUp() {
    hidePopUp();
}