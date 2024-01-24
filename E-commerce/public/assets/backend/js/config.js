function setToken(token) {
    localStorage.setItem('token', `Bearer ${token}`);
}
function getToken() {
    localStorage.getItem('token');
}
// function header() {

// }

function setSessionStorage(email) {
    sessionStorage.setItem('email', email);
}
function getSessionStorage() {
    return sessionStorage.getItem('email');
}

function logout() {
    localStorage.clear();
    sessionStorage.clear();
}