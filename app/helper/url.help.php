<?php 
    // Everything related to URL helper 
    function redirect($page){
     header('location: ' . URLROOT . '/' . $page);
    }
?>