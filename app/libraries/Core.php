<?php

class core{
    //write thing related routings
    //URL format --> controller/method/para_list

    protected $currentController = 'Pages';
    protected $currentMethod = 'home';
    protected $params=[];

    public function __construct(){
         
        $url=$this->getURL();
        if(isset($url)){
            // var_dump($url[0]);die();
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //if controller exist then load it
                $this->currentController = ucwords($url[0]); // get controller part from array     
                //unset the controller in url
                unset($url[0]);           
            }
        }
            //call the controller
        require_once '../app/controllers/'.$this->currentController.'.php';

        //Instentiate the controller
        $this->currentController = new $this->currentController;
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod=$url[1];
                unset($url[1]);
            } 
        }

        $this->params = $url ? array_values($url):[];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getURL(){
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);//filter unnessery thing
            $url=explode('/',$url); //splits the URL into an array using the '/' character as the delimiter

            return $url;
        }
    }

}


?>