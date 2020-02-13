function login() {
    console.log(2);
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
        document.location.href="index.php";
    }
}
export function init() {
    $("#submitbutton").click(login);
    console.log(1);
}