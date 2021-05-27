const delete_user = document.querySelectorAll(".delete_user");
const _token = document.getElementsByName("_token")[0].getAttribute("value");

delete_user.onClick = deleteUser;

delete_user.forEach(delete_user => {
    delete_user.onclick = deleteUser;
});

function deleteUser(){
    const user_id = this.getAttribute("user-id");
    AJAX("DELETE", "/api/user/" + user_id, {_token: _token }, function(){

    });
}

