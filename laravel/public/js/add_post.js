const add_post_button = document.querySelector("#add-post-icon");
const return_button = document.querySelector("#return-icon");

var image;

add_post_button.onclick = add_post_form;
return_button.onclick = return_form;

function add_post_form() {
    AJAX("GET", "/api/post/form", { _token: _token }, function () {
        const group_name = document.querySelector(".group-name");
        const center_col = document.querySelector("#center-col");

        const div = document.createElement("div");
        div.innerHTML = this.responseText.trim();
        if (group_name != null) {
            div.querySelector("#group_id").value = group_name.getAttribute("data-group-id");
        }
        div.querySelector("#add-post-file").onchange = add_image;

        if (group_name != null) {
            insertAfter(div.firstChild, group_name);
        } else {
            center_col.prepend(div.firstChild);
        }
        add_post_button.hidden = true;
        return_button.hidden = false;
    });
}

function return_form() {
    document.querySelector("#add-post-form").parentNode.parentNode.remove();
    add_post_button.hidden = false;
    return_button.hidden = true;
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
            form.querySelector("#add-post-icon").parentNode.insertBefore(image_element, form.querySelector("#add-post-icon"));
            form.querySelector("#add-post-form-space").className = "col-7";
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

function insert_added_post() {
    const responseElement = document.querySelector('#dummyframe').contentDocument.querySelector("pre");
    if (responseElement != null) {
        const responseText = responseElement.innerHTML;
        const response = JSON.parse(responseText);
        const post_id = response['id'];
        if (post_id != undefined) {
            AJAX("GET", "/api/post/" + post_id, { _token: _token }, function () {
                console.log(this.responseText);

                const div = document.createElement("div");
                div.innerHTML = this.responseText.trim();
                div.querySelector(".bi-arrow-right-circle").onclick = sendComment;
                div.querySelector(".bi-hand-thumbs-up").onclick = clickedLike;
                div.querySelector(".bi-hand-thumbs-down").onclick = clickedDislike;
                div.querySelector(".delete-post").onclick = delete_post;

                const group_name = document.querySelector(".group-name");
                const center_col = document.querySelector("#center-col");

                if (group_name != null) {
                    insertAfter(div.firstChild, group_name);
                } else {
                    center_col.prepend(div.firstChild);
                }
                const form = document.querySelector("#add-post-form");
                form.parentNode.parentNode.remove();
                add_post_button.hidden = false;
                return_button.hidden = true;
            });
        } else {
            const p = document.querySelector('.alert-danger');
            p.style.setProperty("display", "flex", "important");
            console.log(p);
            setTimeout(function () { p.style.setProperty("display", "none", "important"); }, 3000);
        }
    }
}
