const delete_post_buttons = document.querySelectorAll(".delete-post");

delete_post_buttons.forEach(delete_post_button => {
    delete_post_button.onclick = delete_post;
});


function delete_post() {
    const post_id = this.getAttribute("data-post-id");
    const clickedButton = this;

    AJAX("DELETE", "/api/post/" + post_id, {_token: _token}, function() {
        console.log(this.responseText);
        const post = clickedButton.parentNode.parentNode.parentNode.parentNode;
        post.remove();
        if (location.pathname.startsWith("/post")) {
            window.location = "/home";
        }
    })
}
