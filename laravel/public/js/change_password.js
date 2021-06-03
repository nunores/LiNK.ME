const submit_button = document.querySelector("#submit-password-change");
console.log(submit_button);
submit_button.onclick = changePassword;


function changePassword() {
    const change_form = document.querySelector("#change-password-form");
    const old_pass = change_form.querySelector("#old-password").value;
    const new_pass = change_form.querySelector("#new-password").value;
    const confirm_pass = change_form.querySelector("#confirm-password").value;
    const p = document.querySelector('.wrong-pass');
    //console.log(test);
    if(old_pass.length < 6 || new_pass.length < 6 || confirm_pass.length < 6){
        p.innerHTML = "All passwords must be at least 6 characters long";
        showResultMessage(p);
        return;
    }

    if(new_pass == confirm_pass){
        const parameters = {old_pass: old_pass, password: new_pass, password_confirmation: confirm_pass, _token: _token }
        AJAX("PUT", "/api/user/password", parameters, function() {
            console.log(this.responseText["id"]); // TODO response text is either the $user or id:false;
            const response = JSON.parse(this.responseText);
            if(response["id"] !== null && response["id"] === false){
                p.innerHTML = "The password provided does not match your password";
                showResultMessage(p);
            }else{
                p.innerHTML = "Password changed succefully";
                showResultMessage(p);
            }
        });
    }else{
        p.innerHTML = "New passwords do not match";
        showResultMessage(p);
    }
}

function showResultMessage(p){
    p.style.setProperty("display", "flex", "important");
    console.log(p);
    setTimeout(function () { p.style.setProperty("display", "none", "important"); }, 5000);

}
