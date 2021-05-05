const delete_button = document.querySelector("#delete-post");

if (delete_button != null)
    delete_button.onclick = delete_post;


function delete_post() {
    const post_id =this.getAttribute("data-post-id");

    const request = new XMLHttpRequest();
    request.addEventListener("load", function() {
        console.log(this.responseText);
        window.location = "/home";
    });
    request.open("DELETE", "http://localhost:8000/api/post/" + post_id, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ _token: _token }));
}
