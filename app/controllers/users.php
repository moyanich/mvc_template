<?php

class Users extends Controller {

    // Load model
    public function __construct(){
       
    }

    public function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function register() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

           // Process Form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => $this->check_input($_POST['username']),
                'password' => $this->check_input($_POST['password']),
                'confirm_password' => $this->check_input($_POST['passwordConfirm']),
                'email' => $this->check_input($_POST['email']),
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Username
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter a username';
            }

            // Validate Email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            }

            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } else if(strlen($data['password'] < 6)) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password do not match';
                }
            }

            // Make sure errors are empty
            if( empty($data['username']) && empty($data['email']) && empty($data['password']) && empty($data['confirm_password']) ) {
                die('SUCCESS');
            }
            else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        }
        else {
            // Initiatlize data
            $data = [
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'email' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
        }
        // Load View
        $this->view('users/register', $data);
    }

    public function login() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

           // Process form
        }
        else {
            // Initiatlize data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
        }

        // Load View
        $this->view('users/login', $data);
    }
    




}