const add_form = document.querySelector("#add-search");

add_form.onsubmit = search_friends;

function search_friends(event) {
    event.preventDefault();
    const value = this.querySelector("input[type=search]").value;
    const headers = document.querySelectorAll(".person-friends-header");
    headers.forEach(header => {
        const name_tag = header.querySelector(".person-friends-name-tag");
        const name = name_tag.getAttribute("data-user-name");
        const username = name_tag.innerHTML;
        if (!(name.includes(value) || username.includes(value))) {
            header.hidden = true;
        } else {
            header.hidden = false;
        }
    });
}
