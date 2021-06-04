const createButton = document.querySelector("#create-button-final");
createButton.onclick = createGroup;

function createGroup() {
    const groupName = document.querySelector("#name-input-group").value
    const userIds = [];

    if(groupName != ""){
        const checkBoxes = document.querySelectorAll("div.checkbox > div.form-check > input.form-check-input");
        checkBoxes.forEach(checkBox => {
            if(checkBox.checked){
                const userId = checkBox.parentElement.parentElement.previousElementSibling.children[0].children[2].children[1].innerHTML; // Vou assumir que o HTML nunca é alterado. Estou a dar target ao elemento hidden no create_group_user.blade.php
                userIds.push(userId);
            }
        });

        AJAX("POST", "/api/group", {'name': groupName, _token: _token}, function() {
            const groupId = JSON.parse(this.responseText)['id'];

            console.log(groupId);

            if(groupId !== null && groupId === false) {
                showError();
                return;
            }

            userIds.forEach(userId => {
                AJAX("POST", "/api/group/request", {'user_id': userId, 'group_id': groupId, _token: _token}, function() {
                    console.log(this.responseText);

                });
            });

            window.location = "/group/" + groupId;
        });

    }
    else{
        showError()
    }
}

function showError() {
    const p = document.querySelector('.alert-danger');
    p.style.setProperty("display", "flex", "important");
    setTimeout(function () { p.style.setProperty("display", "none", "important"); }, 3000);
}
