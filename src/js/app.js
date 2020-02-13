import * as login from "./login.js";
import * as signup from "./signup.js";
import * as tableau from "./permRea.js"

$(document).ready(function () {
    login.init();
    signup.init();
    tableau.init()
});

