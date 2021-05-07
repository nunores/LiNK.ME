const comment_buttons = document.querySelectorAll(".bi-chat-dots");
const comment_boxes = document.querySelector(".add-comment-form");
const submit_buttons = document.querySelectorAll(".bi-arrow-right-circle");

submit_buttons.forEach(submit_button => {
    submit_button.onclick = sendComment;
});

function sendComment(){
    const row = this.parentNode.parentNode.parentNode;
    const text = row.querySelector("#comment-textarea").value;
    const user = row.querySelector('#comment-textarea').getAttribute("data-user-id");
    const post_id = row.parentNode.parentNode.getAttribute('data-post-id');
    const number_comments = document.querySelector("#comments-number-" + post_id);

    const parameters = { post_id: post_id, text: text, _token: _token }
    AJAX("POST", "/api/comment/", parameters, function() {
        console.log(this.responseText);
        const json = JSON.parse(this.responseText);

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


        const form = document.querySelector('.post-comments > form');
        insertAfter(div.firstChild, form);
    });
}



