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
            console.log(this.responseText);
            window.location = "/home";
        });

        // Aqui preciso de pegar no ID do grupo que é criado e meter entries na base de dados com cada user_id e o group_id

    }
    else{
        console.log("Name of the group can't be empty"); // TODO: ver como apresentar este tipo de mensagens
        return;
    }
}

