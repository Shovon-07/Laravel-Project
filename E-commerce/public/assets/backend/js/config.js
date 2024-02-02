function setToken(token) {
    localStorage.setItem("token", token);
}
function getToken() {
    return localStorage.getItem("token")
}

function setSessionData(data) {
    sessionStorage.setItem("data",data);
}
function getSessionData() {
    return sessionStorage.getItem("data");
}

// document.querySelector(".logout").addEventListener("click", () => {
//     localStorage.clear();
//     sessionStorage.clear();
// })

// async function Logout() {
//     localStorage.clear();
//     sessionStorage.clear();

//     const response = await axios.get("/admin/logout");
//     if(response.data['status'] === 'logouted') {
//         window.location.reload();
//     }
// }
