const search_group = document.querySelector("#search_group");

search_group.onsubmit = search_group_function;


function search_group_function(event) {
    event.preventDefault();
    const value = this.querySelector("input[type=search]").value;
    const headers = document.querySelectorAll(".people-row");
    let searched = [];
    headers.forEach(header => {
        const div_search_people = header.querySelectorAll(".search-people")[0];
        let div_checkbox = null;
        if(typeof div_search_people !== "undefined")
            div_checkbox = div_search_people.nextElementSibling;


        const div_search_people2 = header.querySelectorAll(".search-people")[1];
        let div_checkbox2 = null;
        if(typeof div_search_people2 !== "undefined")
            div_checkbox2 = div_search_people2.nextElementSibling;

        let username1 = "null";
        let name1 = "null";
        if(typeof div_search_people !== "undefined"){
            username1 = div_search_people.querySelector("#name-tag").innerHTML
            name1 = div_search_people.querySelector("#person-name").innerHTML
        }

        let username2 = "null";
        let name2 = "null";
        if(typeof div_search_people2 !== "undefined"){
            username2 = div_search_people2.querySelector("#name-tag").innerHTML
            name2 = div_search_people2.querySelector("#person-name").innerHTML
        }

        header.hidden = true;

        if (username1.toUpperCase().includes(value.toUpperCase()) || name1.toUpperCase().includes(value.toUpperCase())) {
            let temp = [div_search_people, div_checkbox]
            searched.push(temp);
        }

        if(username2 != "null" && name2 != "null"){
            if (username2.toUpperCase().includes(value.toUpperCase()) || name2.toUpperCase().includes(value.toUpperCase())) {
                let temp = [div_search_people2, div_checkbox2]
                searched.push(temp);
            }
        }
    });

    let row;
    for (let i = 0; i < searched.length; i++) {
        if (i % 2 == 0) {
            row = document.createElement('div');
            row.className = "row people-row";
        }
        row.appendChild(searched[i][0]);
        row.appendChild(searched[i][1]);
        if (i % 2 == 1) {
            headers[0].parentElement.appendChild(row);
        }
    }
    if (searched.length % 2 == 1) {
        headers[0].parentElement.appendChild(row);
    }

    // TODO: empty gives everyone
    // TODO: problem with caps
}
