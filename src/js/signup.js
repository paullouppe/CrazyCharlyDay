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
        switch (Data.error) {
            case "emptyfields":
                alert("Certains champs sont vides !");
                break;
            case "invalidmail":
                alert("Adresse e-mail non valide !");
                break;
            case "passwordcheck":
                alert("Les deux mots de passe ne sont pas identiques");
                break;
            case "passwordstrength":
                alert("Votre mot de passe doit contenir au moins une majuscule, une minusucle, une nombre et doit contenir au moins 8 caractères");
                break;
            default:
                alert("Erreur");
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