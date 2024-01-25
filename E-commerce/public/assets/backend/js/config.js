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

async function logout() {
    const response = await axios.get("/admin/logout", header());
    console.log(header());
    localStorage.clear();
    sessionStorage.clear();
    window.location.href = "/admin/";
}