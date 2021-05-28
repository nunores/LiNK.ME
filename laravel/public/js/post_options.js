const delete_post_buttons = document.querySelectorAll(".delete-post");
const report_post_buttons = document.querySelectorAll(".report-post");

delete_post_buttons.forEach(delete_post_button => {
    delete_post_button.onclick = delete_post;
});

report_post_buttons.forEach(report_post_button => {
    report_post_button.onclick = report_post;
});


function delete_post() {
    const post_id = this.parentNode.getAttribute("data-post-id");
    const admin = this.parentNode.getAttribute('data-admin');
    const clickedButton = this;

    AJAX("DELETE", "/api/post/" + post_id, {_token: _token, admin: admin}, function() {
        console.log(this.responseText);
        const post = clickedButton.parentNode.parentNode.parentNode.parentNode.parentNode;
        post.remove();
        if (location.pathname.startsWith("/post")) {
            window.location = "/home";
        }
    })
}

function report_post() {
    const post_id = this.parentNode.getAttribute("data-post-id");
    AJAX("POST", "/api/post/report/" + post_id, {_token: _token}, function () {
        console.log(this.responseText);
    });
}
