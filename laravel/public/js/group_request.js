const group_request_buttons = document.querySelectorAll(".group-request-button");
const group_id = document.querySelector("#add-friends-group").getAttribute("data-group-id");

group_request_buttons.forEach(button => {
    button.onclick = send_group_request;
});

function send_group_request() {
    const button_clicked = this;
    const user_id = this.getAttribute("data-user-id");
    const parameters = {_token: _token, group_id: group_id, user_id: user_id}
    AJAX("POST", "/api/group/request", parameters, function () {
        console.log(this.responseText);
        const response = JSON.parse(this.responseText);
        if (response[0].user_id == user_id) {
            button_clicked.parentNode.parentNode.remove();
        }
    });
}
