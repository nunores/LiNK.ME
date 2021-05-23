const feedOrderRelevance = document.querySelector("#feedOrderRelevance");
const feedOrderRecent = document.querySelector("#feedOrderRecent");
const feedTypeGeneral = document.querySelector("#feedTypeGeneral");
const feedTypeFriends = document.querySelector("#feedTypeFriends");

feedTypeGeneral.onclick = general;
feedTypeFriends.onclick = friends;

function general(){
    if (feedOrderRecent.checked)
    {
        AJAX("GET", "/api/posts/" + 'true/' + 'true', {_token: _token}, function() {

            const center_col = document.querySelector(".center-col-col-8");
            const div = document.createElement("div");
            div.innerHTML = this.responseText.trim();
            var children = Array.from(center_col.children);
            children.forEach(child => {
                child.remove();
            });
            center_col.appendChild(div.firstChild);
            console.log(this.responseText);
        })
    }
}

function friends(){
    if (feedOrderRecent.checked)
    {
        AJAX("GET", "/api/posts/" + 'true/' + 'false', {_token: _token}, function() {

            const center_col = document.querySelector(".center-col-col-8");
            const div = document.createElement("div");
            div.innerHTML = this.responseText.trim();
            var children = Array.from(center_col.children);
            children.forEach(child => {
                child.remove();
            });
            center_col.appendChild(div.firstChild);
            console.log(this.responseText);
        })
    }
}



