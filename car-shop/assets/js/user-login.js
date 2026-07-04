const password = document.getElementById("password");
const eye = document.getElementById("toggle-password");
eye.addEventListener("click", function () {
    if (password.type === "password") {
        password.type = "text";
        eye.src = "/car-shop/assets/images/icon/icon-camm.png";
    } else {
        password.type = "password";
        eye.src = "/car-shop/assets/images/icon/icon-mom.png";
    }
});