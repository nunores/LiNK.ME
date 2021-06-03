const load_more_button = document.querySelector('#load-more');

load_more_button.onclick = load_more_posts;

function load_more_posts() {
    const next_page = parseInt(load_more_button.getAttribute('data-page-id')) + 1;
    AJAX("GET", "/api/more_posts?page=" + next_page, {_token: _token}, function() {
        console.log(this.responseText);
        const response = JSON.parse(this.responseText);
        if (response['data'].length == 0) {
            load_more_button.hidden = true;
        } else {
            response['data'].forEach((post) => {
                const post_id = post['id'];
                AJAX("GET", "/api/post/" + post_id, { _token: _token }, function () {
                    const div = document.createElement("div");
                    div.innerHTML = this.responseText.trim();
                    div.querySelector(".bi-arrow-right-circle").onclick = sendComment;
                    div.querySelector(".bi-hand-thumbs-up").onclick = clickedLike;
                    div.querySelector(".bi-hand-thumbs-down").onclick = clickedDislike;
                    if (div.querySelector(".delete-post") != null)
                        div.querySelector(".delete-post").onclick = delete_post;

                    load_more_button.parentNode.insertBefore(div.firstChild, load_more_button);

                    const form = document.querySelector("#add-post-form");
                    form.parentNode.remove();
                    add_post_button.hidden = false;
                    return_button.hidden = true;
                });
            });
        }
        load_more_button.setAttribute("data-page-id", next_page);
    });
}
