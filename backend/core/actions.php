<?php





global $cms_Actions;


function doAction(){
    global $cms_Actions;

    $args = func_get_args();
    $action = array_shift($args);


    if(isset($cms_Actions[$action])){
        return call_user_func($cms_Actions[$action], $args);
    }else{
        //TODO: log this
        return null;
    }




}

function registerAction($action, $callback){
    global $cms_Actions;

    //echo $action . "<br />";

    $cms_Actions[$action] = $callback;


}
