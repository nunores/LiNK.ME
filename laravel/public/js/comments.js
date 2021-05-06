const comment_buttons = document.querySelectorAll(".bi-chat-dots");
const comment_boxes = document.querySelector(".add-comment-form");
const submit_buttons = document.querySelectorAll(".bi-arrow-right-circle");

/*
comment_buttons.forEach(comment_button => {
    comment_button.onclick = showAddComment;
});
*/

submit_buttons.forEach(submit_button => {
    submit_button.onclick = sendComment;
});

//function showAddComment(){ comment_box.hidden ? comment_box.hidden = false : comment_box.hidden = true; }

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function sendComment(){
    const request = new XMLHttpRequest();
    const row = this.parentNode.parentNode.parentNode;
    const text = row.querySelector("#comment-textarea").value;
    const user = row.querySelector('#comment-textarea').getAttribute("data-user-id");
    const post_id = row.parentNode.parentNode.getAttribute('data-post-id');
    const number_comments = document.querySelector("#comments-number-" + post_id);

    request.addEventListener("load", function() {
        console.log(this.responseText);
        const json = JSON.parse(this.responseText);

        addCommentHTML(json.id);
        row.querySelector("#comment-textarea").value = "";
        number_comments.innerHTML = parseInt(number_comments.innerHTML) + 1;
    });
    request.open("POST", "http://localhost:8000/api/comment/", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ post_id: post_id, text: text, _token: _token }));
}

function addCommentHTML(id){
    const request = new XMLHttpRequest();

    request.addEventListener('load', function() {
        const html = this.responseText;

        const div = document.createElement('div');
        div.innerHTML = html.trim();


        const form = document.querySelector('.post-comments > form');
        insertAfter(div.firstChild, form);
    })

    request.open("GET", "http://localhost:8000/api/comment/" + id, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ _token: _token }));
}



