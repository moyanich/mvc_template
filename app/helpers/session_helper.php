<?php
session_start();

// Function flash message
// EXAMPLE - flash('register_sucess', 'You are now registered');
// DISPLAY IN VIEW - echo flash('register_success');

// NOTE TO REVIEW And learn

function flashMessage($name = '', $message = '', $class = '') {
   
    if ( !empty($name) ) {
        if ( !empty($message) && empty($_SESSION[$name]) ) {
            if ( !empty($message) ) {
                unset($_SESSION[$name]);
            }

            if ( !empty( $_SESSION[$name . '_class']) ) {
                unset( $_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
            
        } else if(empty($message) && !empty($_SESSION[$name]) ) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash" role="alert">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    } 
}

/*
function isUserSuperAdmin() {
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_group']) == "1") {
        return true;
    } else {
        return false;
    }
}
*/


function isUserLoggedIn() {
    if(isset($_SESSION['user_id']) && (isset($_SESSION['user_group']) == "1" )) {
        return true;
    } else {
        return false;
    }
}






