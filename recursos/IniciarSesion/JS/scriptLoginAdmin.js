const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});


function togglePasswordVisibility() {
    const input = document.getElementById("clave_administrador");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}