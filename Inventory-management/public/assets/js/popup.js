let popup = document.querySelector('#popup');
let popUpMsg = document.querySelector('#popUpMsg');

function showPopUp(msg) {
    popup.classList.remove('hidePopUp');
    popUpMsg.innerHTML = msg;
}

function hidePopUp() {
    popup.classList.add('hidePopUp');
}

function closePopUp() {
    hidePopUp();
}