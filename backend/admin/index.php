<?php

global $security;
if( !isset($security) ){
    die("ACCESS DENIED");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/backend/admin/css/adminStyle.css"">
    </head>

    <body>

    <div id="wrapper" >
        <div id="login_View">

        </div>

        <nav id="mainMenu" class="hidden">
           <ul>
               <li id="home">
                   Home
               </li>
               <li id="articles">
                   Articles
               </li>
               <li id="pages">
                   Pages
               </li>
               <li id="users">
                   Users
               </li>
           </ul>
        </nav>

        <div id="mainContent" class="hidden">
            <div id="home_View">
                admin things
            </div>


            <?php
            include_once ADMIN . "pages" . DS . "pages.php";
            include_once ADMIN . "pages" . DS . "editPage.php";
            include_once ADMIN . "pages" . DS . "articles.php";
            include_once ADMIN . "pages" . DS . "users.php";

            ?>
        </div>


    </div>



        <script type="module" src="/backend/admin/js/main.js"></script>
    </body>


</html>