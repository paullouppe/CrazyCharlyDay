function login() {
    console.log(2);
    $.post(
        'http://localhost/CrazyCharlyDay/src/inc/login.inc.php', // Un script PHP que l'on va créer juste après
        {
            username : $("#inputEmailAddress").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
            password : $("#inputPassword").val()
        },

        returnData,

        'json' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
    );
}

function returnData(Data){
    if (Data.sucess === false){
        switch (Data.error) {
            case "emptyfields":
                console.log("empty");
                break;
            case "sqlerror":
                console.log("sqlerror");
                break;
            default:
                console.log("error");
                break;
        }
    }else {
        console.log("sucess");
    }
}
export function init() {
    $("#submitbutton").click(login);
    console.log(1);
}