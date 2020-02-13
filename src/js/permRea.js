function addTab() {
    console.log(22);
    $.post(
        './src/inc/AjoutTab.php',
        {},
        AddTab2,
        'json'
    );
    console.log('./src/inc/AjoutTab.php');
}

function AddTab2(Data){
    console.log("zgueg");
    let ajout = document.getElementById("tableauPermRea");
    console.log(Data);
    Data.forEach((e) => {
        ajout.innerHTML = ajout.innerHTML +
            "<tr>\n" +
            "<th>" + e[0] + "</th>\n" +
            "<th>" + e[1] + "</th>\n" +
            "<th>" + e[2] + "</th>\n" +
            "<th>" + e[3] + "</th>\n" +
            "</tr>"
    })
}

export function init() {
    console.log(1);
    window.addEventListener("load",()=>{
        console.log(2);
        addTab()
    })
}