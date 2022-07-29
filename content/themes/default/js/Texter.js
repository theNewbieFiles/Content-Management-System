

export class Texter{

    constructor() {
        this.spanArea = document.getElementById("openerText");

        this.sections = [];

        this.sections[0] = "PHP, MySQL, JavaScript, HTML, CSS";
        this.sections[1] = "I'm A Full Stack Developer";

        this.currentSection = 0;
        this.currentLetter = 0;
        this.count = 0;
    }

    init(){
        this.update();
    }

    update(){
        this.count++;
        
        if (this.count > 5){

            this.count = 0;

            this.updateText();


        }


        requestAnimationFrame(this.update.bind(this));
    }

    updateText(){
        this.spanArea.innerText = this.sections[this.currentSection].substring(0, this.currentLetter);

        this.currentLetter++;

        if(this.currentLetter > this.sections[this.currentSection].length){
            this.currentLetter = 0;
            this.currentSection++;

            this.count = -100;

            if(this.currentSection === this.sections.length){
                this.currentSection = 0;
            }
        }
    }



}