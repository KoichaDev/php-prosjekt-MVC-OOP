<?php 
    // This will be used to require all the necesarily file in order to start/initalize our essential files
    // Like our libraries, config files etc.

    // Load the config file
    require_once 'config/config.php';

    // Load helper file 
    require_once 'helper/error.help.php';
    require_once 'helper/session.help.php';
    require_once 'helper/url.help.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.lib.php';
    });
?>

