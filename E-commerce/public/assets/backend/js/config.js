function setToken(token) {
    localStorage.setItem('token', `Bearer ${token}`);
}

function getToken() {
    localStorage.getItem('token');
}

function logout() {
    localStorage.clear();
    sessionStorage.clear();
}