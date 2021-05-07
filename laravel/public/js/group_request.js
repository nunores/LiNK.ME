const group_request_buttons = document.querySelectorAll(".group-request-button");
const group_id = document.querySelector("#group-name").getAttribute("data-group-id");

group_request_buttons.forEach(button => {
    button.onclick = send_group_request;
});

function send_group_request() {
    AJAX("POST", "/api/group/request", {_token: _token, group_id: group_id}, function () {
        console.log(this.responseText);
    });
}
