<?php



class Error_View{


    private $db;

    public function __construct(PDO $DB, Exception $e){
        $this->db = $DB;

        // $e;


    }

    public function init(array $site, WebPage $WebPage){
        echo "there was an error";
    }

}
