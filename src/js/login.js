function runLogin(e) {
    switch (e.error) {
        case "emptyfield":
            console.log("empty fields ");
            break;
    }
}

function login() {
    console.log(1);
    $.post( "../inc/login.inc.php", $( "#loginform" ).serialize(), runLogin,"json");
}

export function init() {
    $('#submitbutton').on("click", login);
}