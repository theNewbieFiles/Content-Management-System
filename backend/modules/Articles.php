<?php


class Articles
{
    private $db;
    private $uri;

    public $data = null;

    public function __construct(PDO $DB){
        $this->db = $DB;
    }

    public function init($URI){
        $this->uri = $URI;

        $query = $this->db->prepare("SELECT * FROM cms_articles WHERE url = ?");

        $query->execute([$URI[0]]);

        $this->data = $query->fetch();

    }

    public function getArticle($URI = null){
        if($this->data !== null){
            return $this->data;


        }

        return null;
    }

    public function getTitle(){

    }

    public function getViews(array $URL){

        if($URL[0] == null){
            $query = $this->db->prepare("SELECT page_views FROM cms_uri WHERE uri = ?");

            $query->execute([$this->uri[0]]);

            return $query->fetch()["page_views"];
        }

        return null;
    }

}