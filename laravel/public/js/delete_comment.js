const delete_comment_buttons = document.querySelectorAll("#delete-comment");

delete_comment_buttons.forEach(delete_comment_button => {
    delete_comment_button.onclick = delete_comment;
});

function delete_comment() {
    const comment_id = this.getAttribute("data-comment-id");

    const request = new XMLHttpRequest();
    request.addEventListener("load", function() {
        console.log(this.responseText);


    });
    request.open("DELETE", "http://localhost:8000/api/comment/" + comment_id, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({_token: _token }));
}
