let popup = document.querySelector(".popup");
let popUpMsg = document.querySelector(".popUpMsg");

function showPopUp(msg) {
    popup.classList.remove("hidePopUp");
    popUpMsg.innerHTML = msg;
    editAbleItem.value = msg;
}

// Show popup for delete category
let deletePopUp = document.querySelector("#deletePopUp");
let deleteAbleItem = document.querySelector(".deleteAbleItem");
function deleteAlertPopUp(msg) {
    deletePopUp.classList.remove("hidePopUp");
    deleteAbleItem.value = msg;
}

// Show popup for edit category
let editPopUp = document.querySelector("#editPopUp");
let editAbleItem = document.querySelector(".editAbleItem");
// let categoryName = document.querySelector(".categoryName");
function editePopUp(id) {
    editPopUp.classList.remove("hidePopUp");
    editAbleItem.value = id;
    // categoryName.value = id;
}

// Show popup for create brand
// let deletePopUp = document.querySelector("#deletePopUp");
// let deleteAbleItem = document.querySelector(".deleteAbleItem");
function createBrandPopUp(msg) {
    deletePopUp.classList.remove("hidePopUp");
    deleteAbleItem.value = msg;
}



function hidePopUp() {
    popup.classList.add("hidePopUp");
    deletePopUp.classList.add("hidePopUp");
    editPopUp.classList.add("hidePopUp");
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