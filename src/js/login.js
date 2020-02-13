function login() {
    $.post(
        'src/inc/login.inc.php',
        {
            mail : $("#inputEmailAddress").val(),
            pwd : $("#inputPassword").val()
        },
        returnData,

        'json'
    );
}

function returnData(Data){
    if (Data.sucess === false){
        switch (Data.error) {
            case "emptyfields":
                $('#mdp').replaceWith('<div class="d-inline-flex alert alert-danger ml-2" role="alert" id="mdp">Champs vides !</div>');
                break;
            case "sqlerror":
                $('#mdp').replaceWith('<div class="d-inline-flex alert alert-danger ml-2" role="alert" id="mdp">Erreur SQL !</div>');
                break;
            case "wrongpassword":
                    $('#mdp').replaceWith('<div class="d-inline-flex alert alert-danger ml-2" role="alert" id="mdp">Mot de passe incorrect !</div>');
                break;
            default:
                $('#mdp').replaceWith('<div class="d-inline-flex alert alert-danger ml-2" role="alert" id="mdp">Erreur !</div>');
                break;
        }
    }else {
        document.location.href="index.php";
    }
}
export function init() {
    $("#submitbutton").click(login);
    console.log(1);
}