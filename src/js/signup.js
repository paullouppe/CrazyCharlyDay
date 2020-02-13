function signup() {
    $.post(
        'src/inc/signup.inc.php',
        {
            prenom : $("#inputFirstName").val(),
            nom : $("#inputLastName").val(),
            mail : $("#inputEmailAddress").val(),
            pwd : $("#inputPassword").val(),
            pwd_repeat : $("#inputPassword").val(),
        },
        returnData,

        'json'
    );
}

function returnData(Data){
    if (Data.sucess === false){
        console.log(1);
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
        document.location.href="login.php";
    }
}
export function init() {
    $("#registersubmitbutton").click(signup);
    console.log(1);
}