const like_buttons = document.querySelectorAll(".bi-hand-thumbs-up");
const dislike_buttons = document.querySelectorAll(".bi-hand-thumbs-down");

like_buttons.forEach(like_button => {
    like_button.onclick = clickedLike;
});

dislike_buttons.forEach(dislike_button => {
    dislike_button.onclick = clickedDislike;
});



function clickedLike() {
    const post_id = this.getAttribute('data-post-id');
    const number_likes = document.querySelector('#number-likes-' + post_id);
    const number_dislikes = document.querySelector('#number-dislikes-' + post_id);
    const like_button = document.querySelector("#like-button-" + post_id);
    const dislike_button = document.querySelector("#dislike-button-" + post_id);

    if (like_button.style.color == "var(--green)") {
        // API call to unlike
        AJAX("DELETE", "/api/like/" + post_id, {_token: _token}, function() {
            console.log(this.responseText);
            number_likes.innerHTML = parseInt(number_likes.innerHTML) - 1;
            like_button.style.color = "var(--bs-light)";
        });
    } else {
        if (dislike_button.style.color == "var(--pink)") {
            // API call to remove dislike and like
            AJAX("PUT", "/api/like/" + post_id, { id: post_id, likes: true, _token: _token }, function() {
                console.log(this.responseText);
                number_likes.innerHTML = parseInt(number_likes.innerHTML) + 1;
                like_button.style.color = "var(--green)";

                number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) - 1;
                dislike_button.style.color = "var(--bs-light)";
            });
        } else {
            // API call to like
            AJAX("POST", "/api/like/" + post_id, { id: post_id, likes: true, _token: _token }, function() {
                console.log(this.responseText);
                number_likes.innerHTML = parseInt(number_likes.innerHTML) + 1;
                like_button.style.color = "var(--green)";
            });
        }
    }
}

function clickedDislike() {
    const post_id = this.getAttribute('data-post-id');
    const number_likes = document.querySelector('#number-likes-' + post_id);
    const number_dislikes = document.querySelector('#number-dislikes-' + post_id);
    const like_button = document.querySelector("#like-button-" + post_id);
    const dislike_button = document.querySelector("#dislike-button-" + post_id);

    if (dislike_button.style.color == "var(--pink)") {
        // API call to undislike
        AJAX("DELETE", "/api/like/" + post_id, {_token: _token}, function() {
            console.log(this.responseText);
            number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) - 1;
            dislike_button.style.color = "var(--bs-light)";
        });
    } else {
        if (like_button.style.color == "var(--green)") {
            // API call to remove like and add dislike
            AJAX("PUT", "/api/like/" + post_id, { id: post_id, likes: false, _token: _token }, function() {
                console.log(this.responseText);
                dislike_button.style.color = "var(--pink)";
                number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) + 1;

                like_button.style.color = "var(--bs-light)";
                number_likes.innerHTML = parseInt(number_likes.innerHTML) - 1;
            });
        } else {
            // API call to dislike
            AJAX("POST", "/api/like/" + post_id, { id: post_id, likes: false, _token: _token }, function() {
                console.log(this.responseText);
                number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) + 1;
                dislike_button.style.color = "var(--pink)";
            });

        }
    }
}
