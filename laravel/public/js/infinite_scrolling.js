let load_more_button = document.querySelector('#load-more');

load_more_button.onclick = load_more_posts;

function load_more_posts() {
    const next_page = parseInt(load_more_button.getAttribute('data-page-id')) + 1;
    const feedTypeFriends = document.querySelector("#feedTypeFriends");

    AJAX("GET", "/api/more_posts?page=" + next_page, {_token: _token}, function() {
        console.log(this.responseText);
        const response = JSON.parse(this.responseText);
        if (response['current_page'] >= response['last_page']) {
            load_more_button.style.display = "none";
        }
        load_more_button.setAttribute("data-page-id", next_page);
        response['data'].forEach((post) => {
            const post_id = post['id'];
            AJAX("GET", "/api/post/" + post_id, { _token: _token }, function () {
                const div = document.createElement("div");
                div.innerHTML = this.responseText.trim();
                if (load_more_button.getAttribute('data-login') == true) {
                    console.log(load_more_button.getAttribute('data-login'));
                    div.querySelector(".bi-arrow-right-circle").onclick = sendComment;
                    div.querySelector(".bi-hand-thumbs-up").onclick = clickedLike;
                    div.querySelector(".bi-hand-thumbs-down").onclick = clickedDislike;
                    if (div.querySelector(".delete-post") != null)
                        div.querySelector(".delete-post").onclick = delete_post;
                }

                load_more_button.parentNode.insertBefore(div.firstChild, load_more_button);
            });
        });
    });
}
