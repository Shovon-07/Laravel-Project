let popup = document.querySelector('.popup');
let popUpMsg = document.querySelector('.popUpMsg');

function showPopUp(msg) {
    popup.classList.remove('hidePopUp');
    popUpMsg.innerHTML = msg;
}

function hidePopUp() {
    popup.classList.add('hidePopUp');
}

let closePopUp = document.querySelectorAll("#closePopUp");
closePopUp.forEach((item) => {
    item.addEventListener("click", ()=>{
        hidePopUp();
    })  
})

// function closePopUp() {
//     hidePopUp();
// }