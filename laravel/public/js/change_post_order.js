const feedTypeGeneral = document.querySelector("#feedTypeGeneral");
const feedTypeFriends = document.querySelector("#feedTypeFriends");

feedTypeGeneral.onclick = general;
feedTypeFriends.onclick = friends;

function general(){
    AJAX("GET", "/api/posts/" + 'true', {_token: _token}, function() {

        const center_col = document.querySelector(".center-col-col-8");
        const div = document.createElement("div");
        div.innerHTML = this.responseText.trim();
        let children = Array.from(center_col.children);
        children.forEach(child => {
            child.remove();
        });
        center_col.appendChild(div.firstChild);

        updatePost();

    })

}

function friends(){
    AJAX("GET", "/api/posts/" + 'false', {_token: _token}, function() {

        const center_col = document.querySelector(".center-col-col-8");
        const div = document.createElement("div");
        div.innerHTML = this.responseText.trim(); 
        var children = Array.from(center_col.children);
        children.forEach(child => {
            child.remove();
        });
        center_col.appendChild(div.firstChild);

        updatePost();
        
    })
}

function updatePost() {
    like_buttons = document.querySelectorAll(".bi-hand-thumbs-up");
    dislike_buttons = document.querySelectorAll(".bi-hand-thumbs-down");

    like_buttons.forEach(like_button => {
        like_button.onclick = clickedLike;
    });

    dislike_buttons.forEach(dislike_button => {
        dislike_button.onclick = clickedDislike;
    });

    delete_comment_buttons = document.querySelectorAll(".delete-comment");
    report_comment_buttons = document.querySelectorAll(".report-comment");


    delete_comment_buttons.forEach(delete_comment_button => {
        delete_comment_button.onclick = delete_comment;
    });

    report_comment_buttons.forEach(report_comment_button => {
        report_comment_button.onclick = report_comment;
    });

    submit_buttons = document.querySelectorAll(".bi-arrow-right-circle");

    submit_buttons.forEach(submit_button => {
        submit_button.onclick = sendComment;
    });

    delete_post_buttons = document.querySelectorAll(".delete-post");
    report_post_buttons = document.querySelectorAll(".report-post");

    delete_post_buttons.forEach(delete_post_button => {
        delete_post_button.onclick = delete_post;
    });

    report_post_buttons.forEach(report_post_button => {
        report_post_button.onclick = report_post;
    });

    load_more_button = document.querySelector('#load-more');
    load_more_button.onclick = load_more_posts;
}


