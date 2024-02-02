//___ Tostify message ___//
function showTost(msg) {
    Toastify({
        text: msg,
        duration: 5000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnHover: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
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