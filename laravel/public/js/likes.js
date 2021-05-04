const like_button = document.querySelector(".bi-hand-thumbs-up");
const dislike_button = document.querySelector(".bi-hand-thumbs-down");
const number_likes = document.querySelector("#number-likes");
const number_dislikes = document.querySelector("#number-dislikes");
const post_id = document.querySelector(".post").getAttribute("data-id");
const _token = document.getElementsByName("_token")[0].getAttribute("value");

like_button.onclick = clickedLike;
dislike_button.onclick = clickedDislike;

const encodeForAjax = (data) => {
	return Object.keys(data).map(function (k) {
		return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
	}).join('&')
}

function clickedLike() {
    const request = new XMLHttpRequest();
    if (like_button.style.color == "var(--green)") {
        // API call to unlike
        request.addEventListener("load", function() {
            console.log(this.responseText);
            number_likes.innerHTML = parseInt(number_likes.innerHTML) - 1;
            like_button.style.color = "var(--bs-light)";
        });
        request.open("DELETE", "http://localhost:8000/api/like/" + post_id, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encodeForAjax({ _token: _token }));
    } else {
        if (dislike_button.style.color == "var(--pink)") {
            // API call to remove dislike and like
            request.addEventListener("load", function() {
                console.log(this.responseText);
                number_likes.innerHTML = parseInt(number_likes.innerHTML) + 1;
                like_button.style.color = "var(--green)";

                number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) - 1;
                dislike_button.style.color = "var(--bs-light)";
            });
            request.open("PUT", "http://localhost:8000/api/like/" + post_id, true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send(encodeForAjax({ id: post_id, likes: true, _token: _token }));
        } else {
            // API call to like
            request.addEventListener("load", function() {
                console.log(this.responseText);
                number_likes.innerHTML = parseInt(number_likes.innerHTML) + 1;
                like_button.style.color = "var(--green)";
            });
            request.open("POST", "http://localhost:8000/api/like/" + post_id, true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send(encodeForAjax({ id: post_id, likes: true, _token: _token }));
        }
    }
}

function clickedDislike() {
    const request = new XMLHttpRequest();
    if (dislike_button.style.color == "var(--pink)") {
        // API call to undislike
        request.addEventListener("load", function() {
            console.log(this.responseText);
            number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) - 1;
            dislike_button.style.color = "var(--bs-light)";
        });
        request.open("DELETE", "http://localhost:8000/api/like/" + post_id, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encodeForAjax({ _token: _token }));
    } else {
        if (like_button.style.color == "var(--green)") {
            // API call to remove like and add dislike
            request.addEventListener("load", function() {
                console.log(this.responseText);
                dislike_button.style.color = "var(--pink)";
                number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) + 1;

                like_button.style.color = "var(--bs-light)";
                number_likes.innerHTML = parseInt(number_likes.innerHTML) - 1;
            });
            request.open("PUT", "http://localhost:8000/api/like/" + post_id, true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send(encodeForAjax({ id: post_id, likes: false, _token: _token }));
        } else {
            // API call to dislike
            request.addEventListener("load", function() {
                console.log(this.responseText);
                number_dislikes.innerHTML = parseInt(number_dislikes.innerHTML) + 1;
                dislike_button.style.color = "var(--pink)";
            });
            request.open("POST", "http://localhost:8000/api/like/" + post_id, true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send(encodeForAjax({ id: post_id, likes: false, _token: _token }));

        }
    }
}
