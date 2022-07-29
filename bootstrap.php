<?php


//start the session
session_start();

//start the output buffer
ob_start();

define("DS", DIRECTORY_SEPARATOR);

//define paths
define( 'ABSPATH', __DIR__ . DS );
define( 'BACKEND', ABSPATH . "backend" . DS );
define( 'ADMIN', BACKEND . "admin" . DS );
define("CONFIG", ABSPATH . "config" . DS);
define("CORE", BACKEND . "core" . DS);
define("MODULES", BACKEND . "modules" . DS);
define("HELPERS", BACKEND . "helpers" . DS);
define("VIEWS", BACKEND . "views" . DS);
define("CONTENT", ABSPATH . "content" . DS);
define("THEMES", CONTENT . "themes" . DS);

//load the config file
require_once ABSPATH . "config.php";



//create the database connection
require_once "backend/core/Database.php";
$_DB = getDatabaseConn();


//get site info
require_once CORE . "Options.php";
$options = createOptions($_DB);


//user
require_once CORE . "User.php";
$user = new User();


//action hooks
require_once CORE . "actions.php";

//hooks
require_once CORE . "hooks.php";

//load the core
require_once CORE . "Core.php";
$core = new Core($_DB, $user, $options);

//route the request to where it needs to go
$core->route();






