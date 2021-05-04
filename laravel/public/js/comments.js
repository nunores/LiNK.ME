const comment_button = document.querySelector(".bi-chat-dots");
const comment_box = document.querySelector(".add-comment-form");
const submit_button = document.querySelector(".bi-arrow-right-circle");

comment_button.addEventListener("click", showAddComment);

submit_button.onclick = sendComment;

function showAddComment(){ comment_box.hidden ? comment_box.hidden = false : comment_box.hidden = true; }

function sendComment(){
    const request = new XMLHttpRequest();
    const text = document.querySelector("#comment-textarea").value;

    request.addEventListener("load", function() { // TODO: "refresh" page
        console.log(this.responseText);
    });
    request.open("POST", "http://localhost:8000/api/comment/", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ post_id: post_id, text: text, _token: _token }));
}


