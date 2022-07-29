<?php


class WebPage
{
    private $db;

    public $uri = null;
    public $pageData = null;
    public $articleData = null;
    public $owner = null;



    public function __construct(PDO $DB){
        $this->db = $DB;
    }

    public function init($URI){
        // check if page exists


        $query = $this->db->prepare("SELECT * FROM cms_pages WHERE uri = ?");
        $query->execute([$URI]);

        if($this->pageData = $query->fetch()){
            $query = $this->db->prepare("UPDATE cms_pages SET page_views = page_views + 1 WHERE uri = ?");
            $query->execute([$URI]);




            return true;
        }

        return false;

    }

    public function checkForArticle(){
        if(!$this->pageData){return false;}//no page no article

        $query = $this->db->prepare("SELECT * FROM cms_articles WHERE page_id = ?");
        $query->execute([$this->pageData['page_id']]);

        if($this->articleData = $query->fetch()){
            return true;
        }

        return false;
    }

    //page gets
    public function getPageID($URI){
        if($URI[0] == null){
            return $this->pageData['page_id'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getHeaderTitle($URI){
        if($URI[0] == null){
            return $this->pageData['header_title'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getOwner($URI){
        if($URI[0] == null){
            if($URI[1]){
                //its for a link
                return str_replace(" ", "-", $this->pageData['owner']);
            }
            return $this->pageData['owner'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getPageViews($URI){
        if($URI[0] == null){
            return $this->pageData['page_views'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getLastAccessed($URI){
        if($URI[0] == null){
            return $this->pageData['last_accessed'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getPageData($URI){
        if($URI[0] == null){
            return $this->pageData['data'];
        }

        //TODO:code the rest of this
        return null;
    }

    //article gets
    public function getArticleID($URI){
        if($URI[0] == null){
            return $this->articleData['article_id'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getArticleTitle($URI){
        if($URI[0] == null){
            return $this->articleData['title'];
        }

        //TODO:code the rest of this
        return null;
    }

    public function getArticleCreated($URI){
        if($URI[0] == null){
            return $this->articleData['created'];
        }

        //TODO:code the rest of this
        return null;
    }




}