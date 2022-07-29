<?php

echo get_Header();

http_response_code(404);
?>


<body>
<div id="wrapper">


    <div id="headerArea">

        <a href="." id="logo">
            <img src="/content/themes/default/img/logo.png" alt="logo">
        </a>

        <?php get_Section("mainMenu") ?>
    </div>


    <div id="_404">
        404 not found...
    </div>








    <?php echo get_Footer() ?>


</div>
</body>
</html>