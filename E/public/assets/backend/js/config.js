function unAuthorized(code) {
    if(code === 401) {
        localStorage.clear();
        sessionStorage.clear();
        window.location.href = "/logout";
    }
}

function setToken(token) {
    localStorage.setItem("token",`Bearer ${token}`);
}

function getToken() {
    return localStorage.getItem("token");
}

function headerToken() {
    let token = getToken();
    return {
        headers : {Authorization: token}
       };
}