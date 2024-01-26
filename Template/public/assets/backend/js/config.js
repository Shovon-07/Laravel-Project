function setToken(token) {
    localStorage.setItem("token", token);
}
function getToken() {
    return localStorage.getItem("token")
}

// async function Logout() {
//     localStorage.clear();
//     sessionStorage.clear();

//     const response = await axios.get("/admin/logout");
//     if(response.data['status'] === 'logouted') {
//         window.location.reload();
//     }
// }

