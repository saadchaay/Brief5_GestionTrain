const form_password = document.getElementById("password-form");
const btn_password = document.getElementById("btn-password");
const new_password = document.getElementById("new-pass");
const cNew_password = document.getElementById("conf-new-pass");

form_password.setAttribute('style', 'display: none;');
new_password.setAttribute('disabled', true);
cNew_password.setAttribute('disabled', true);

function displayPassaword() {
    new_password.removeAttribute('disabled');
    cNew_password.removeAttribute('disabled');
    form_password.removeAttribute("style");
    btn_password.removeAttribute("onclick");
    btn_password.setAttribute('onclick', "hideForm()");
    btn_password.textContent = "hide";
}

function hideForm(){
    new_password.setAttribute('disabled', true);
    cNew_password.setAttribute('disabled', true);
    form_password.removeAttribute('style');
    form_password.setAttribute('style', 'display: none;');
    btn_password.removeAttribute("onclick");
    btn_password.setAttribute('onclick', "displayPassaword()");
    btn_password.textContent = "Update Password";
}


