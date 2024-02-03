//___ Tostify message ___//
function successTost(msg) {
    Toastify({
        text: msg,
        duration: 1500,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnHover: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
    }).showToast();
}

function errorTost(msg) {
    Toastify({
        text: msg,
        duration: 1000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnHover: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(-190deg, #f70505, #710303)",
        },
    }).showToast();
}

//___ Side nav ___//
let dropParent = document.querySelectorAll("#dropParent");
let dropdownMenu = document.querySelector(".dropdown");

dropParent.forEach((itmes) => {
    itmes.addEventListener("click", () => {
        itmes.querySelector(".dropdown").classList.toggle("display");
        itmes.querySelector(".rightIcon").classList.toggle("rotate");
    });
});