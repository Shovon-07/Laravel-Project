function setToken(token) {
    localStorage.setItem('token', `Bearer ${token}`);
}
function getToken() {
    return localStorage.getItem('token');
}
function header() {
    const token = getToken();
    return {
        headers: { 
          'Authorization': token, 
        }
    };
}

function setSessionStorage(email) {
    sessionStorage.setItem('email', email);
}
function getSessionStorage() {
    return sessionStorage.getItem('email');
}