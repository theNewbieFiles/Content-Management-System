

export class MainMenu {


    constructor(props) {


        this.links = document.getElementsByClassName("blog_cats_a");

        console.log(this.links);

        Array.from(this.links).forEach( link => {
            link.onmouseover = () => {
                console.log(link);
            }
        });
    }



}