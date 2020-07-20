<?php

// Load Config
require_once 'config/config.php';

// Load Libraries

// Autoload Core Libraries
spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    require_once 'libraries/' . $className . '.class.php';
}

/*
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.class.php';
});
  
*/
