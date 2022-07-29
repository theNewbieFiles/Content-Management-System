<?php

require_once MODULES . "HTMLMaker.php";
require_once MODULES . "Articles.php";
require_once MODULES . "Categories.php";


class PageEnvironment
{
    private $db;
    private $user;
    private $options;
    private $webPage;



    private $htmlMaker;

    private $template;

    private $article;

    private $categories;

    public function __construct(PDO $DB, User $User, array $Options, WebPage $WebPage){
        $this->db = $DB;
        $this->user = $User;
        $this->options = $Options;
        $this->webPage = $WebPage;


        //objects not used in other places
        $this->htmlMaker = new HTMLMaker($this->db);

/*        //most pages will have an article
        $this->article = new Articles($DB);
        $this->article->init($URI);*/

        $this->categories = new Categories($this->db);
    }

    public function init(){


        registerAction("getHeader", array($this, "getHeader"));
        registerAction("getFooter", array($this, "getFooter"));
        registerAction("getDir", array($this, "getDir"));
        registerAction("includeScript", array($this, "includeScript"));
        registerAction("getTitle", array($this, "getTitle"));
        registerAction("makeMenu", array($this, "makeMenu"));
        registerAction("getHead", array($this, "getHead"));
        registerAction("getSection", array($this, "getSection"));
        registerAction("createLink", array($this, "createLink"));
        registerAction("getRecentArticle", array($this, "getRecentArticle"));
        registerAction("get_Categories", array($this->categories, "getCategories"));





        registerAction("geturi", array($this, "geturi"));

        //page
        registerAction("getPageID", array($this->webPage, "getPageID"));
        registerAction("getHeaderTitle", array($this->webPage, "getHeaderTitle"));
        registerAction("getOwner", array($this->webPage, "getOwner"));
        registerAction("getPageViews", array($this->webPage, "getPageViews"));
        registerAction("getLastAccessed", array($this->webPage, "getLastAccessed"));
        registerAction("getPageData", array($this->webPage, "getPageData"));
        registerAction("getArticleID", array($this->webPage, "getArticleID"));

        //articles
        registerAction("getArticleTitle", array($this->webPage, "getArticleTitle"));
        registerAction("getArticleCreated", array($this->webPage, "getArticleCreated"));
    }



    public function getHead(){
        /*<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_Title() ?></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="<?php echo getDir() . "/css/style.css" ?>">*/

        if($this->webPage->pageData){
            echo "<title>".$this->webPage->pageData['header_title']."</title>";
        }else{
            echo "<title>".$this->options["site_name"]."</title>";
        }

    }

    public function getHeader(){
        $file =  THEMES . $this->options['template'] . DS . "header.php";
        if(file_exists($file)){
            include_once $file;
        }
    }

    public function getFooter(){
        $file =  THEMES . $this->options['template'] . DS . "footer.php";
        if(file_exists($file)){
            include_once $file;
        }
    }

    public function getDir(){
        return "/content/themes/" . $this->options['template'];
    }

    public function includeScript($Args){
        $script = $Args[0];

        $from = "/content/themes/" . $this->options['template'] . "/js/";

        if($Args[1] !== null){
            $from = $Args[1];
        }

        return $from . $script;
    }

    public function getTitle(){
        return $this->webPage->pageData['header_title'];
    }

    public function getSection($Args){
        $file = THEMES . $this->options['template'] . DS . $Args[0] . ".php";

        if(file_exists($file)){
            include $file;
        }
    }



    //html creators
    public function makeMenu($MenuName){

        return $this->htmlMaker->createMenu($MenuName[0]);
    }

    public function createLink($LinkId){
        return $this->htmlMaker->createLink($LinkId);
    }

    public function createFeatured(){

    }

    //modules

    public function getRecentArticle(){
        $this->db->prepare("SELECT * FROM cms_articles ORDER BY created LIMIT 1");
    }


    public function getArticle(){
        echo "here";
    }



}