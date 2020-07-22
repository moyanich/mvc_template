<?php

// Simple page redirect 


function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
}

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}