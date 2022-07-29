import * as Three from "/content/themes/default/js/lib/three.module.js";

export class backgroundAnimation {

    constructor() {
        this.mainCanvas = document.getElementById('canvasBackground');
        this.mainCanvas.width = window.innerWidth;
        this.mainCanvas.height = window.innerHeight;


        //camera
        this.camera = new Three.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 0.01, 100000 );


        //scene
        this.scene = new Three.Scene();
        //this.scene.background = new Three.Color(0x777777);

        //add camera
        this.scene.add(this.camera);

        //light
        this.light = new Three.DirectionalLight( 0xffffff, 1 ); // soft white light
        this.light.position.x = -450;
        this.light.castShadow = true;

        this.light.shadow.camera.top = 200;
        this.light.shadow.camera.bottom = -200;
        this.light.shadow.camera.left = 200;
        this.light.shadow.camera.right = -200;
        this.scene.add(this.light);



        //render
        this.renderer = new Three.WebGLRenderer({
            canvas: this.mainCanvas //tell it what canvas I want to use
        });
        this.renderer.shadowMap.enabled = true;
        this.renderer.setPixelRatio(window.devicePixelRatio);
        this.renderer.setSize(window.innerWidth, window.innerHeight, false);


        //planet
        let geometry = new Three.SphereGeometry( 100, 32, 32 );

        let material = new Three.MeshStandardMaterial( {
            color: "#000083",
            polygonOffset: true,
            polygonOffsetFactor: 1, // positive value pushes polygon further away
            polygonOffsetUnits: 1,
            flatShading: false
        } );

        this.sphere = new Three.Mesh( geometry, material );
        this.sphere.castShadow = false;
        this.sphere.receiveShadow = true;
        this.scene.add(this.sphere);

        let geo = new Three.EdgesGeometry( this.sphere.geometry ); // or WireframeGeometry
        let mat = new Three.LineBasicMaterial( { color: "#0000af" } );
        let wireframe = new Three.LineSegments( geo, mat );
        this.sphere.add( wireframe );

        //moon
        this.moonContainer = new Three.Object3D();

        this.scene.add(this.moonContainer);


        let moonGeo = new Three.SphereGeometry( 25, 16, 16 );
        let MoonMaterial = new Three.MeshStandardMaterial( {
            color: "#000083",
            polygonOffset: true,
            polygonOffsetFactor: 1, // positive value pushes polygon further away
            polygonOffsetUnits: 1,
            flatShading: false
        } );
        this.moon = new Three.Mesh(moonGeo, MoonMaterial);
        this.moon.castShadow = true;
        this.moon.receiveShadow = false;

        this.moon.position.x = 250;
        this.moonContainer.add(this.moon);

        let moonEdges = new Three.EdgesGeometry( this.moon.geometry ); // or WireframeGeometry
        let mat2 = new Three.LineBasicMaterial( { color: "#0000af" } );
        let moonWireFrame = new Three.LineSegments( moonEdges, mat2 );
        this.moon.add( moonWireFrame );


        //position camera
        this.camera.position.x = -150;
        this.camera.lookAt(this.sphere.position);
        this.camera.position.z = 100;
        this.camera.position.y += 15;

        this.camera.rotation.z += 0.3;

        //default values
        this.moonSpeed = .001;
        this.moonMove = true;

        //key presses
        this.leftArrow = false;
        this.rightArrow = false;
        this.upArrow = false;
        this.downArrow = false;

        window.addEventListener("keydown", (e) => {
            switch (e.code) {
                case "ArrowLeft":
                    this.leftArrow = true;
                    break;

                case "ArrowRight":
                    this.rightArrow = true;
                    break;

                case "KeyW":
                    this.upArrow = true;
                    break;

                case "KeyS":
                    this.downArrow = true;
                    break;

                case "ShiftRight":
                    this.moonMove = !this.moonMove;
                    break;
            }

        }, false);

        window.addEventListener("keyup", (e) => {
            switch (e.code) {
                case "ArrowLeft":

                    this.leftArrow = false;
                    break;

                case "ArrowRight":
                    this.rightArrow = false;
                    break;

                case "KeyW":
                    this.upArrow = false;
                    break;

                case "KeyS":
                    this.downArrow = false;
                    break;

            }

        }, false);

    }

    init(){

    }

    update(){

        if(this.leftArrow){
            this.moonContainer.rotation.y += .01;
        }

        if(this.rightArrow){
            this.moonContainer.rotation.y -= .01;
        }

        if(this.upArrow){
            this.moonContainer.rotation.z += .01;
        }

        if(this.downArrow){
            this.moonContainer.rotation.z -= .01;
        }




        if(this.moonMove){
            this.moonContainer.rotation.y -= .005;
        }


        this.moon.rotation.y -= .005;

        this.sphere.rotation.y -= .005;

        this.renderer.render(this.scene, this.camera);
        requestAnimationFrame(this.update.bind(this));
    }



    randomIntFromInterval(min, max) { // min and max included
        return Math.floor(Math.random() * (max - min + 1) + min)
    }

}