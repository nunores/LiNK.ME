const submit_button = document.querySelector("#submit-password-change");
console.log(submit_button);
submit_button.onclick = changePassword;


function changePassword() {
    const change_form = document.querySelector("#change-password-form");
    const old_pass = change_form.querySelector("#old-password").value;
    const new_pass = change_form.querySelector("#new-password").value;
    const confirm_pass = change_form.querySelector("#confirm-password").value;
    console.log(test);
    if (old_pass == test){ //TODO Check if old pass is correct
        console.log();
        if(new_pass == confirm_pass){

            const parameters = {text: new_pass, _token: _token }
            AJAX("PUT", "/api/user/password", parameters, function() {
                console.log(this.responseText);
            });
        }else{
            console.log("Password does not match in both instances")
        }
    }else{
        console.log("Password does not match real password")
    }


}
