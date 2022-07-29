<?php


class Categories
{

    private $db;


    public function __construct(PDO $DB){
        $this->db = $DB;
    }

    public function getCategories($Parent){




        if(!isset($Parent[0])){
            return $this->getAllCategories();
        }

        $query = $this->db->prepare("SELECT * FROM cms_categories WHERE parent = ?");

        if($query->execute([$Parent[0]])){
            return $query->fetchAll();
        }

        return null;



    }

    public function getAllCategories(){
        $query = $this->db->prepare("SELECT * FROM cms_categories");

        if($query->execute()){
            return $query->fetchAll();
        }

        return null;
    }

}