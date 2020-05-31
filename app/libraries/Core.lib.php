<?php 
    
    /*
     * Creates URL & Load Core controller
     * URL FORMAT - /controller/method/params
     */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            print_r($this -> getUrl());

            $url = $this->getUrl();

            // Look in controllers for first value
            // This will look for the associative array of the first position [0].
                if(($url !== false) && file_exists('../app/controllers/' . ucwords($url[0]). '.controller.php')){
                // If it exist, then we want to set by overwriting old value of currentController = 'Pages' to the new one
                // Example localhost/mvc/posts or localhost/mvc/pages etc.
                $this->currentController = ucwords($url[0]);

                // Unset 0 index
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.controller.php';

            // Instantiate the controller class by looking for the controller folder from the app for example Home.controller.php
            // If the controller is found, then it will use the class Name (class Home) and then we want to create
            // e.g. $pages = new Pages;
            $this->currentController = new $this->currentController;

            // This is going to work with the methods of the url
            // e.g. URL: localhost/pages/about. The 'about' will the method which is assoc. array [1]

            // Check for second part of the url
            if(isset($url[1])) {
                // Check to see if the method exist in the controller
                if(method_exists($this -> currentController, $url[1])) {
                    $this -> currentMethod = $url[1];
                    
                    unset($url[1]);
                }
            }

            // Get params 
            // array_values() returns all the values from the array and indexes the array numerically.

            $this -> params = $url ? array_values($url) : [];

            // Returns the return value of the callback, or FALSE on error.
            call_user_func_array([$this -> currentController, $this -> currentMethod], $this -> params);
        }

        public function getUrl() {
            
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            } else {
                return false;
            }
        }
    }
?>