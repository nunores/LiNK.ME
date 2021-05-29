let delete_comment_buttons = document.querySelectorAll(".delete-comment");
let report_comment_buttons = document.querySelectorAll(".report-comment");


delete_comment_buttons.forEach(delete_comment_button => {
    delete_comment_button.onclick = delete_comment;
});

report_comment_buttons.forEach(report_comment_button => {
    report_comment_button.onclick = report_comment;
});

function delete_comment() {
    const comment_id = this.parentNode.getAttribute("data-comment-id");
    const clicked_button = this.parentNode;
    const post_id = this.parentNode.getAttribute('data-post-id');
    const number_comments = document.querySelector("#comments-number-" + post_id);
    const admin = this.parentNode.getAttribute('data-admin');

    AJAX("DELETE", "/api/comment/" + comment_id, {_token: _token, admin: admin }, function() {
        console.log(this.responseText);
        const comment = clicked_button.parentNode.parentNode.parentNode.parentNode;
        comment.remove();
        number_comments.innerHTML = parseInt(number_comments.innerHTML) - 1;
    });
}

function report_comment() {
    const comment_id = this.parentNode.getAttribute("data-comment-id");
    const clicked_button = this;
    AJAX("POST", "/api/comment/report/" + comment_id, {_token: _token}, function () {
        console.log(this.responseText);
        clicked_button.remove();
    });
}
