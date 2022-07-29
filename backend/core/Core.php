<?php


//includes
require_once CORE . "WebPage.php";
require_once CORE . "PageEnvironment.php";
require_once VIEWS . "Page_View.php";
require_once VIEWS . "Error_View.php";


class Core{

    private $db;
    private $user;
    private $options;

    public function __construct(PDO $DB, User $User, array $Options){
        $this->db = $DB;
        $this->user = $User;
        $this->options = $Options;
    }

    public function intiPlugin(){
        registerAction("getUserName", array($this->user, "getUserName"));
        registerAction("getSiteName", array($this->options, "getSiteName"));
    }

    public function route(){
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': //its a get request
                //get the address info
                $uri = $this->getURI();

                switch ($uri[0]){

                    case 'admin':
                        $this->admin();
                        break;

                    case 'file':
                        $this->file();
                        break;

                    default:
                        //requesting a page
                        $this->page($uri);

                }
                break;
            case 'POST':

                echo "hey a post request";
                break;

            case 'Put':
                echo "This is a put request";
                break;

            case 'Delete':
                echo "This is a delete request";
                break;

            default:
                die("Can't handle " . $_SERVER['REQUEST_METHOD']);
        }
    }


    private function admin(){
        require_once ADMIN . "index.php";
    }

    private function file(){
        echo "requesting a file";
    }

    private function page($URI){
        $webPage = new WebPage($this->db);
        //setup the page environment
        $pageEnv = new PageEnvironment($this->db, $this->user, $this->options, $webPage);
        $pageEnv->init();

        //load the page object
        try {
            $page = new Page_View($webPage, $this->options, $pageEnv);
            $page->init($URI);

        }catch (Exception $e) {
            $error = new Error_View($this->db, $e);
        }
    }



    private function getURI(){
        $uri = explode("/", $_SERVER['REQUEST_URI']);

        //first spot is empty
        array_shift($uri);


        return $uri;
        //$this->view = array_shift($uri);
        /*$this->page = array_shift($uri);
        $this->other = $uri;*/

    }



}








