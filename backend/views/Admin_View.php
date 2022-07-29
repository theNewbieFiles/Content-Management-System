<?php


class Admin_View
{

    public function __construct(){


    }




    public function init(array $Options, WebPage $WebPage){
        $admin = BACKEND . "admin" . DS . "index.php";


        if(!file_exists($admin)){
            return false;
        }

        require_once $admin;

        return true;
    }

}