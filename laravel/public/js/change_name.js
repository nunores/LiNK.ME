const change_name_buttons = document.querySelectorAll("#change-name-icon");
const name_boxes = document.querySelector(".change-name-form");
const submit_name_buttons = document.querySelectorAll(".change-name");
const post_names = document.querySelectorAll("#person-name");

console.log(submit_name_buttons);

submit_name_buttons.forEach(submit_button => {
    submit_button.onclick = changeName;
});

function changeName(){
    const row = this.parentNode.parentNode.parentNode;
    const text = row.querySelector(".name-textarea").value;

    const parameters = {text: text, _token: _token }
    AJAX("PUT", "/api/user/name", parameters, function() {
        const div = document.querySelector('#profile-person-name');
        const pencil = document.querySelector("#change-name-icon");
        div.innerHTML = text;
        div.appendChild(pencil);
        name_boxes.className = "collapse";
        post_names.forEach(post_name => {
            post_name.innerHTML = text;
        });
    });
}
