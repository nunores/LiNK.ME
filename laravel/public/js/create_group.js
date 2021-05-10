const createButton = document.querySelector("#create-button-final");
const _token = document.getElementsByName("_token")[0].getAttribute("value");
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
            console.log(this.responseText);
            console.log(JSON.parse(this.responseText));

            const groupId = JSON.parse(this.responseText)['id'];

            userIds.forEach(userId => {
                AJAX("POST", "/api/group/request", {'user_id': userId, 'group_id': groupId, _token: _token}, function() {
                    console.log(this.responseText);

                });
            });

            window.location = "/group/" + groupId;
        });

    }
    else{
        console.log("Name of the group can't be empty"); // TODO: ver como apresentar este tipo de mensagens
        return;
    }
}

