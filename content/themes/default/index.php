<?php


echo get_Header();

?>
    <body>

    <div id="wrapper">


        <div id="headerArea">

            <?PHP
                /*<a href="." id="logo">
                    <img src="/content/themes/default/img/logo.png" alt="logo">
                </a>*/

            ?>


            <?php get_Section("mainMenu") ?>
        </div>


        <div id="opener">
            <canvas id="canvasBackground" title="left and right arrows move the moon faster. W and S move it up and down. Right Shift stops its orbit"></canvas>

            <div id="oldopener" class="">
                <span>HI, </span> <br />
                <span>I'm <span class="red">Chris</span></span> <br />
                <span id="openerText"></span>
            </div>
        </div>

        <div id="featured">
            <h1>Featured Posts</h1>
            <div id="featuredWrapper">
                <div class="feat featA">
                    <img src="/content/themes/default/img/cms.jpg" alt="">

                    <div class="featInfo">
                        <div class="featCats">
                            <a href="/category/programming">Programming</a>
                            <a href="/category/php">php</a>
                            <a href="/category/js">JavaScript</a>
                        </div>
                        <a href="/creating-a-content-management-system"><h2>Creating a Content Management System</h2></a>
                    </div>
                </div>

                <div class="feat featB">
                    <img src="/content/themes/default/img/3dback.png" alt="">

                    <div class="featInfo">
                        <div class="featCats">
                            <a href="/category/THREE.JS">Three.js</a>
                            <a href="/category/js">JavaScript</a>
                        </div>
                        <a href="/3dbackground"><h2>Creating the 3d background</h2></a>
                    </div>
                </div>

                <!--<div class="feat featC">
                    test c
                </div>-->


            </div>
        </div>
        

        <div id="projects">
            <h1>Projects</h1>

            <div class="project">
                <div class="display">
                    <img src="/content/themes/default/img/myCms.png" alt="Picture of my CMS">
                </div>

                <div class="projectInfo">
                    <h2>This Website</h2>
                    <p>
                        Custom built CMS and template system. <br/>
                        Built using PHP, MySQL, JavaScript, HTML 5, and CSS <br/>

                    </p>
                    <a href="/this-website">Read More...</a>
                </div>

            </div>

            <div class="project">
                <div class="display2">
                    <img src="/content/themes/default/img/skyrimCloneScreenShot.png" alt="Picture of my RPG Game">
                </div>

                <div class="projectInfo2">
                    <h2>Open World RPG</h2>
                    <p>
                        This is a unnamed open world RPG. Built in JavaScript, using Three.js
                    </p>
                    <a href="/open-world-rpg-javascript">Read More...</a>
                </div>

            </div>

            <div class="project">
                <div class="display">
                    <img src="/content/themes/default/img/arcApp.png" alt="Picture of my arc app">
                </div>

                <div class="projectInfo">
                    <h2>Time Tracking App</h2>
                    <p>
                        System for tracking employee time and safety compliance <br/>
                        <br/> PHP, MySQL, JavaScript, HTML 5, and CSS
                    </p>
                    <a href="/arc-app">Read More...</a>
                </div>

            </div>
        </div>




        <?php echo get_Footer() ?>


    </div>




    <!--<script type="module" src="/js/main.js"></script>-->
<script type="module" src="<?php echo includeScript("main.js") ?>"></script>


    </body>
</html>

<!--Images -->
<!--Image by <a href="https://pixabay.com/users/mohamed_hassan-5229782/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4308363">mohamed Hassan</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=4308363">Pixabay</a>-->
<!--Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/-->
<!--<p>

    Hello! I'm Chris Wilson, I’m passionate about software development and I’m skilled in C#, PHP, JavaScript, Node, HTML, CSS. I have experience with React.js, jQuery, and RESTful APIs
    I’m now looking for a junior dev position.
    <br />
    In recent years, I’ve cultivated my passion for coding by studying programming architecture, but most of all, by building games using JavaScript
</p>-->





