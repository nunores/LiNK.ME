const add_post_button = document.querySelector("#add-post-icon");
const return_button = document.querySelector("#return-icon");

var image;

add_post_button.onclick = add_post_form;
return_button.onclick = return_form;

function add_post_form() {
    AJAX("GET", "/api/post/form", { _token: _token }, function () {
        const user_name = document.querySelector(".profile-info");

        const div = document.createElement("div");
        div.innerHTML = this.responseText.trim();
        div.querySelector("#add-post-file").onchange = add_image;

        insertAfter(div.firstChild, user_name);

        add_post_button.hidden = true;
        return_button.hidden = false;
    });
}

function return_form() {
    document.querySelector("#add-post-form").parentNode.remove();
    add_post_button.hidden = false;
    return_button.hidden = true;
}

function add_post() {
    const form = document.querySelector("#add-post-form");
    const text = form.querySelector("textarea").value;
    const url = form.querySelector("img") != null ? form.querySelector("img").src : null;
    var parameters;
    if (url != null) {
        if (location.pathname.startsWith("/group")) {
            const group_id = document.querySelector(".group-name").getAttribute("data-group-id");

            parameters = { _token: _token, description: text, picture: image, group_id: group_id };
        } else {
            parameters = { _token: _token, description: text, picture: image };
        }
    } else {
        if (location.pathname.startsWith("/group")) {
            const group_id = document.querySelector(".group-name").getAttribute("data-group-id");

            parameters = { _token: _token, description: text, group_id: group_id };
        } else {
            parameters = { _token: _token, description: text };
        }
    }
    console.log(image);
    AJAX("POST", "/api/post", parameters, function () {
        console.log(this.responseText);
        const response = JSON.parse(this.responseText);
        insert_added_post(response["id"]);
        form.parentNode.remove();
    });
}

function add_image(event) {
    image = event.target.files[0];
    const form = document.querySelector("#add-post-form");

    const fileReader = new FileReader();
    fileReader.onload = function () {
        var image_element = form.querySelector("img");
        if (image_element == null) {
            image_element = document.createElement("img");
            image_element.src = fileReader.result;
            image_element.height = 50;
            image_element.style.paddingRight = "1rem";
            form.insertBefore(image_element, form.querySelector("#add-post-icon"));
            image_element.onclick = function () {
                image_element.remove();
                image = null;
            };
        } else {
            image_element.src = fileReader.result;
        }
    }
    if (image && image.type.match('image.*'))
        fileReader.readAsDataURL(image);
}

// function insert_added_post(post_id) {
//     AJAX("GET", "/api/post/" + post_id, { _token: _token }, function () {
//         console.log(this.responseText);

//         const div = document.createElement("div");
//         div.innerHTML = this.responseText.trim();
//         div.querySelector(".bi-arrow-right-circle").onclick = sendComment;
//         div.querySelector(".bi-hand-thumbs-up").onclick = clickedLike;
//         div.querySelector(".bi-hand-thumbs-down").onclick = clickedDislike;
//         div.querySelector(".delete-post").onclick = delete_post;

//         const group_name = document.querySelector(".group-name");
//         const center_col = document.querySelector("#center-col");

//         if (group_name != null) {
//             insertAfter(div.firstChild, group_name);
//         } else {
//             center_col.prepend(div.firstChild);
//         }
//         add_post_button.hidden = false;
//         return_button.hidden = true;
//     });
// }