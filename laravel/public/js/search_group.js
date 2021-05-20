const search_group = document.querySelector("#search_group");

search_group.onsubmit = search_group_function;


function search_group_function(event) {
    event.preventDefault();
    const value = this.querySelector("input[type=search]").value;
    const headers = document.querySelectorAll(".people-row");
    headers.forEach(header => {
        const div_search_people = header.querySelectorAll(".search-people")[0];
        const div_checkbox = div_search_people.nextElementSibling;

        const div_search_people2 = header.querySelectorAll(".search-people")[1];
        const div_checkbox2 = div_search_people2.nextElementSibling;

        const username1 = div_search_people.querySelector("#name-tag").innerHTML
        const name1 = div_search_people.querySelector("#person-name").innerHTML

        const username2 = div_search_people2.querySelector("#name-tag").innerHTML
        const name2 = div_search_people2.querySelector("#person-name").innerHTML

        console.log(username1)
        console.log(name1)
        console.log(username2)
        console.log(name2)


        //TODO: tenho de tentar esconder o elemento, provavelmente vou ter de criar elementos novos e chapar onde deve ser


    });

}
