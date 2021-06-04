const submit_button = document.querySelector("#submit-password-change");
submit_button.onclick = changePassword;


function changePassword() {
    const change_form = document.querySelector("#change-password-form");
    const old_pass = change_form.querySelector("#old-password").value;
    const new_pass = change_form.querySelector("#new-password").value;
    const confirm_pass = change_form.querySelector("#confirm-password").value;
    const popUp = document.querySelector('.wrong-pass');
    if(old_pass.length < 6 || new_pass.length < 6 || confirm_pass.length < 6){
        popUp.innerHTML = "All passwords must be at least 6 characters long";
        showResultMessage(p);
        return;
    }

    if(new_pass == confirm_pass){
        const parameters = {old_pass: old_pass, password: new_pass, password_confirmation: confirm_pass, _token: _token }
        AJAX("PUT", "/api/user/password", parameters, function() {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);
            if(response["id"] !== null && response["id"] === false){
                popUp.innerHTML = "The password provided does not match your password";
                showResultMessage(popUp);
            }else{
                popUp.innerHTML = "Password changed succefully";
                showResultMessage(popUp);
            }
        });
    }else{
        popUp.innerHTML = "New passwords do not match";
        showResultMessage(popUp);
    }
}

function showResultMessage(popUp){
    popUp.style.setProperty("display", "flex", "important");
    setTimeout(function () { popUp.style.setProperty("display", "none", "important"); }, 5000);

}
