const change_name_buttons = document.querySelectorAll("#change-name-icon");
const name_boxes = document.querySelector(".change-name-form");
const submit_name_buttons = document.querySelectorAll(".change-name");

submit_name_buttons.forEach(submit_button => {
    submit_button.onclick = changeName;
});

function changeName(){
    const row = this.parentNode.parentNode.parentNode;
    const text = row.querySelector("#comment-textarea").value;
    const oldname = document.querySelector('#profile-person-name').getAttribute("data-user-name");

    const parameters = {text: text, _token: _token }
    AJAX("PUT", "/api/user/name", parameters, function() {
        console.log(this.responseText);
        const div = document.querySelector('#profile-person-name');
        const replace = div.innerHTML.substring(oldname.length, div.innerHTML.length);
        div.innerHTML = text + replace;
        name_boxes.parentNode.remove();
    });
}
