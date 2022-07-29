import {backgroundAnimation} from "./backgroundAnimation.js";
import {Texter} from "./Texter.js";
import {MainMenu} from "./MainMenu.js";

document.addEventListener("DOMContentLoaded", function(){


    let bgc = new backgroundAnimation();

    bgc.update();

    //texter
    let t = new Texter();
    t.init();

    //main menu
    let mainMenu = new MainMenu();



    console.log("Hello, Funny meeting you here.");
    console.log("I love software development");
    console.log("I'd love to develop software for you.");

});