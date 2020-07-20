<?php

require_once 'libraries/core.class.php';
require_once 'libraries/controller.class.php';
require_once 'libraries/database.class.php';

/*
spl_autoload_register('myAutoloader', false);

spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    $path = "libraries/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) :
        //echo "File does not exist";
        return false;
    else: 
        require_once $fullPath;
    endif; 
}
*/