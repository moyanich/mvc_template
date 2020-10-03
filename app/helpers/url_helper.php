<?php

// Simple page redirect 


function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
}

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

/**
 * File Upload
 * 
 * @param   
 * @return  
 */
function setFilepath($file) {
	//$target_dir = APPROOT . "/views/files/" . $file . "/";
	//files/job-descriptions/
	$target_dir = "files/" . $file . "/";
	return $target_dir;
}

function getFilepath($file) {
    $filepath = URLROOT . "/files/" . $file . "/";
   // $filepath = "files/" . $file . "/";
	return $filepath;
}