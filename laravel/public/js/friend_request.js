const friend_request_buttons = document.querySelectorAll(".friend-request-button");
const friend_id = document.querySelector("#profile-person-name").getAttribute("data-person-id");
const _token = document.getElementsByName("_token")[0].getAttribute("value");

console.log(friend_request_buttons);

friend_request_buttons.forEach(button => {
    button.onclick = send_friend_request;
});

function send_friend_request() {
    const button_clicked = this;
    const user_id = this.getAttribute("data-user-id");
    console.log(user_id);
    const parameters = {_token: _token, user_id: user_id}
    console.log(_token);
    AJAX("POST", "/api/link/request", parameters, function () {
        console.log(this.responseText);
        const response = JSON.parse(this.responseText);
        if (response[0].user_id == user_id) {
            button_clicked.parentNode.remove();
        }
    });
}
