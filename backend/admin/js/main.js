import {AdminApp} from "./AdminApp.js";

console.log("admin here");

document.addEventListener("DOMContentLoaded", function(){


    //start the loop
    let app = new AdminApp();

    app.init();
});