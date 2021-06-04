const friend_request_buttons = document.querySelectorAll(".friend-request-button");
const accept_friend_request_buttons = document.querySelectorAll(".notification-friend-request > .bi-check");
const deny_friend_request_buttons = document.querySelectorAll(".notification-friend-request > .bi-x");

friend_request_buttons.forEach(button => {
    button.onclick = send_friend_request;
});

accept_friend_request_buttons.forEach(button => {
    button.onclick = accept_friend_request;
});

deny_friend_request_buttons.forEach(button => {
    button.onclick = deny_friend_request;
})

function send_friend_request() {
    const button_clicked = this;
    const user_id = this.getAttribute("data-user-id");
    const parameters = {_token: _token, user_id: user_id}
    AJAX("POST", "/api/link/request", parameters, function () {
        console.log(this.responseText);
        const response = JSON.parse(this.responseText);
        if (response[0]['id'] != null) {
            button_clicked.remove();
        }
    });
}

function accept_friend_request() {
    const user_id = this.parentNode.getAttribute('data-user-id');
    const button_clicked = this;
    AJAX("POST", "/api/link/accept", {_token: _token, user_id, user_id}, function () {
        console.log(this.responseText);
        button_clicked.parentNode.parentNode.parentNode.remove();
    });
}

function deny_friend_request() {
    const user_id = this.parentNode.getAttribute('data-user-id');
    const button_clicked = this;
    AJAX("POST", '/api/link/deny', {_token: _token, user_id: user_id}, function() {
        console.log(this.responseText);
        button_clicked.parentNode.parentNode.parentNode.remove();
    });
}
