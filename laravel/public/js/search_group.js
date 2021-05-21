const search_group = document.querySelector("#search_group");

search_group.onsubmit = search_group_function;


function search_group_function(event) {
    event.preventDefault();
    const value = this.querySelector("input[type=search]").value;
    const headers = document.querySelectorAll(".people-row");
    let searched = [];
    headers.forEach(header => {
        const div_search_people = header.querySelectorAll(".search-people")[0];
        const div_checkbox = div_search_people.nextElementSibling;

        const div_search_people2 = header.querySelectorAll(".search-people")[1];
        const div_checkbox2 = div_search_people2.nextElementSibling;

        const username1 = div_search_people.querySelector("#name-tag").innerHTML
        const name1 = div_search_people.querySelector("#person-name").innerHTML

        const username2 = div_search_people2.querySelector("#name-tag").innerHTML
        const name2 = div_search_people2.querySelector("#person-name").innerHTML

        header.hidden = true;

        if (username1.includes(value) || name1.includes(value)) {
            searched.push(div_search_people);
        }
        if (username2.includes(value) || name2.includes(value)) {
            searched.push(div_search_people2);
        }

        console.log(div_search_people);

        //console.log(searched);

    });

/*     let row;
    for (let i = 0; i < searched.length; i++) {
        if (i % 2 == 0) {
            row = document.createElement('div');
            row.className = "row people-row";
        }
        row.appendChild(searched[i]);
        if (i % 2 == 1) {
            headers.parent.appendChild(row);
        }
    }
    if (searched.length % 2 == 1) {
        headers.parent.appendChild(row);
    } */
}
