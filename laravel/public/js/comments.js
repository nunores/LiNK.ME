const comment_buttons = document.querySelectorAll(".bi-chat-dots");
const comment_boxes = document.querySelector(".add-comment-form");
let submit_buttons = document.querySelectorAll(".bi-arrow-right-circle");
let comment_parent;

submit_buttons.forEach(submit_button => {
    submit_button.onclick = sendComment;
});

function sendComment(){
    const row = this.parentNode.parentNode.parentNode;
    const text = row.querySelector("#comment-textarea").value;
    const post_id = row.parentNode.parentNode.getAttribute('data-post-id');
    const number_comments = document.querySelector("#comments-number-" + post_id);

    const parameters = { post_id: post_id, text: text, _token: _token }
    AJAX("POST", "/api/comment/", parameters, function() {
        console.log(this.responseText);
        const json = JSON.parse(this.responseText);
        comment_parent = document.querySelector('#add-comment-' + json["post_id"]).parentNode;

        addCommentHTML(json.id);
        row.querySelector("#comment-textarea").value = "";
        number_comments.innerHTML = parseInt(number_comments.innerHTML) + 1;
    });
}

function addCommentHTML(id){
    AJAX("GET", "/api/comment/" + id, {_token: _token}, function() {
        const html = this.responseText;

        const div = document.createElement('div');
        div.innerHTML = html.trim();
        div.querySelector(".delete-comment").onclick = delete_comment;

        insertAfter(div.firstChild, comment_parent);
    });
}



