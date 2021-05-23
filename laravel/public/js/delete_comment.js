const delete_comment_buttons = document.querySelectorAll(".delete-comment");
const _token = document.getElementsByName("_token")[0].getAttribute("value");

delete_comment_buttons.forEach(delete_comment_button => {
    delete_comment_button.onclick = delete_comment;
});

function delete_comment() {
    const comment_id = this.getAttribute("data-comment-id");
    const clicked_button = this;
    const post_id = this.getAttribute('data-post-id');
    const number_comments = document.querySelector("#comments-number-" + post_id);
    const admin = this.getAttribute('data-admin');

    AJAX("DELETE", "/api/comment/" + comment_id, {_token: _token, admin: admin }, function() {
        console.log(this.responseText);
        const comment = clicked_button.parentNode.parentNode.parentNode;
        comment.remove();
        number_comments.innerHTML = parseInt(number_comments.innerHTML) - 1;
    });
}
