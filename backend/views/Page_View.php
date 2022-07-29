<?php


require_once CORE . "WebPage.php";

class Page_View{


    private $template;
    private $webPage;
    private $options;
    private $pageEnv;
    private $type;

    public function __construct(WebPage $WebPage, array $Options, PageEnvironment $PageEnv){
        $this->webPage = $WebPage;
        $this->pageEnv = $PageEnv;

        $this->options = $Options;
    }




    public function init($URI){

        $file = "404";

        //home page
        if($URI[0] == null || $URI[0] == 'home'){$file = 'index';}

        //check for category
        if($URI[0] == 'category'){$file = "category";}

        //check if its a user
        if($URI[0] == 'user'){$file = "user";}

        if($this->webPage->init($URI[0])){
            if($this->webPage->checkForArticle()){
                $file = "article";
            }else{
                $file = 'page';
            }

            //$this->pageEnv->setPage($this->webPage);
        }




        $template = THEMES . $this->options['template']. DS . $file . ".php";

        if(file_exists($template)){

            include_once $template;
        }else{
            echo $template;
            throw new Exception("divided by zero");
        }



        /*if($WebPage->isHome){
            //show the home page
            $file = "index";
        }


        $template = THEMES . $Options['template'] . DS . $file . ".php";


        if(!file_exists($template)){
            //if the file doesn't exit try index.php;
            $template = THEMES . $Options['template'] . DS . "index.php";

            if(!file_exists($template)){
                throw new Exception('Division by zero.');
            }
        }*/


        //$fileName = "cache/" . $WebPage->uri;

        //checked if cached
        /*if(FIlE_CACHING && file_exists($fileName)){

            if(time() - filemtime($fileName) < 36){

                echo file_get_contents($fileName);
                return;

            }
        }*/

        //include_once $template;

        //cache a copy of the page
        /*$page = ob_get_contents();

        $f = fopen($fileName, "w");

        fwrite($f, $page);

        fclose($f);*/






        //send out the page
        ob_end_flush();





        return true;
    }
}