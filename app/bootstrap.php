<?php

// Load Config
require_once 'config/config.php';


//Load Helpers
require_once 'helpers/session_helper.php';
//require_once 'helpers/token_helper.php';
require_once 'helpers/url_helper.php';


// Load Libraries

// Autoload Core Libraries
spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    require_once 'libraries/' . $className . '.class.php';
}

