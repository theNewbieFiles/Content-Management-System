<?php


//this is the template to display articles

?>
<?php echo get_Header() ?>

<body>
    <div id="wrapper">
        <div id="headerArea">

            <a href="." id="logo">
                <img src="/content/themes/default/img/logo.png" alt="logo">
            </a>

            <?php get_Section("mainMenu") ?>
        </div>


        <div id="article">
            <article class="article">
                <div class="header">
                    <h1 class="title"><?php echo get_ArticleTitle() ?></h1>

                    <div class="byline">
                        <address class="author">By <a rel="author" href="/user/<?php echo get_Owner(null, true) ?>"><?php echo get_Owner() ?></a></address>
                        <!--TODO: Do this date format-->
                        <!--on <time datetime="2011-08-28" title="August 28th, 2011">8/28/11</time>-->
                        <div class="views">Views <?php get_views() ?></div>
                    </div>
                </div>





                <div class="article-content">
                    <?php echo get_PageData() ?>
                </div>
            </article>
        </div>


        <?php echo get_Footer() ?>
    </div>


    <!--<script type="module" src="/js/main.js"></script>-->
    <!--<script type="module" src="<?php /*echo includeScript("myTest.js") */?>"></script>-->


</body>
</html>