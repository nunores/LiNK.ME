document.querySelector("#add-picture-file").onchange = submit_profile_pic;

function submit_profile_pic(event) {
    event.preventDefault();

    const form_element = document.querySelector("#add-picture-form");
    form_element.submit();
}
