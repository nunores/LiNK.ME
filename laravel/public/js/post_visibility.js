const public_buttons = document.querySelectorAll('.make-post-public');
const private_buttons = document.querySelectorAll('.make-post-private');

public_buttons.forEach(button => {
    button.onclick = make_post_public;
});

private_buttons.forEach(button => {
    button.onclick = make_post_private;
})

function make_post_public() {
    const public_button = this;
    const private_button = this.parentNode.querySelector('.make-post-private');
    const post_id = this.parentNode.getAttribute('data-post-id');
    AJAX("PUT", "/api/post/" + post_id + "/visibility", {_token: _token, private: false}, function() {
        console.log(this.responseText);
        public_button.hidden = true;
        private_button.hidden = false;
    })
}

function make_post_private() {
    const private_button = this;
    const public_button = this.parentNode.querySelector('.make-post-public');
    const post_id = this.parentNode.getAttribute('data-post-id');
    AJAX("PUT", "/api/post/" + post_id + "/visibility", {_token: _token, private: true}, function() {
        console.log(this.responseText);
        public_button.hidden = false;
        private_button.hidden = true;
    })
}
