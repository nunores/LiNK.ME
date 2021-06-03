
document.querySelector("#add-picture-file").onchange = add_image;

function add_image(event) {
    event.preventDefault();

    const form_element = document.querySelector("#add-picture-form");
    console.log("Hello2222");
    form_element.submit();
}
