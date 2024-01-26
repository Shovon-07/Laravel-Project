let popup = document.querySelector(".popup");
let popUpMsg = document.querySelector(".popUpMsg");

function showPopUp(msg) {
    popup.classList.remove("hidePopUp");
    popUpMsg.innerHTML = msg;
}

// Show popup for delete category
let deleteCategoryPopUp = document.querySelector("#deleteCategoryPopUp");
let deleteCategoryMsg = document.querySelector(".deleteCategoryMsg");
function showDeleteCategoryPopUp(msg) {
    deleteCategoryPopUp.classList.remove("hidePopUp");
    deleteCategoryMsg.value = msg;
}

function hidePopUp() {
    popup.classList.add("hidePopUp");
    deleteCategoryPopUp.classList.add("hidePopUp");
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
