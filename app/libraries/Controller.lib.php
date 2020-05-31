<?php 
    /**
    * ! This will loads the models and views framework, and act like a bridge between the View and Models
    * This is going to be our base controller Parent class. 
    * This class will use to methods to load the modules for our 
    * Pages.controller.php (child/sub-class) e.g. The child/sub-class will inherit from the controller class 
    */

    class Controller {
        // Load model 
        // This will be used to load our post model
        public function model($model) {
            require_once '../app/models/' . $model . '.model.php';
            // Instantiate our new model object
            // Example will return new Pages(), new Users() etc.;
            return new $model();
        }

        // Load View 
        public function view($view, $data = []) {
            // Check for the view file
            if(file_exists('../app/views/' . $view . '.view.php')) {
                require_once '../app/views/' . $view . '.view.php';
            } else {
                // View does not exist
                die('View does not exist!');
            }
        }
    }
?>