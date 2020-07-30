<?php

class Users extends Controller {

    // Load model
    public function __construct(){
        $this->userModel = $this->model('User');
    }

   /* public function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } */

    public function register() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */

            //  Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['passwordConfirm']),
                'email' => trim($_POST['email']),
                'roleID' => trim($_POST['roleID']),
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'roleID_err' => ''
            ];

            //  Validate Username
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter a username';
            } else {
                /// check if username exists
                if($this->userModel->findUserByUsername($data['username'])){
                    $data['username_err'] = 'User already exists! Please try another username or <a href="login">login into your account</a>';
                }
            }
    
            // Validate Email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                /// check if email exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email already exists! Please try another email or <a href="login">login into your account</a>';
                }
            }

            //  Validate User Role
            if(empty($data['roleID'])) {
                $data['roleID_err'] = 'Please select a Role';
            } else {
                /// check if role exists
                if($this->userModel->validateUserRole($data['roleID'])){
                    $data['roleID_err'] = 'Invalid!';
                }
            } 

            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } else if(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if( empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, array("cost" => 12));

                // Register User
                if($this->userModel->registerUser($data)) {
                    flashMessage('register_sucess', 'Registration Successful! You can now login.', 'alert alert-success');

                    redirect('users/login');
                } else {
                    
                    die('Something went wrong');
                }
            }
            else {
                flashMessage('register_failure', 'Registration not Successful! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('users/register', $data);
            }
        }
        else {
            // Initiatlize data
            $userRoles = $this->userModel->getUserRoles();  //Load user Roles

            $data = [
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'email' => '',
                'roleID' => $userRoles,
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'roleID_err' => ''
            ];

            // Load View
            $this->view('users/register', $data);
        }
    }


    public function login() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            /*
             * Process Form
            */

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // GET data from Form
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
            ];

            // Validate Username
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter a username';
            }

            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } 

            // Check if username field is not empty, then check if user exists
            if(!empty($data['username'])) {
                
                if($this->userModel->findUserByUsername($data['username'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                    if ($loggedInUser) {
                        //Create session
                        $this->createUserSession($loggedInUser);
                    }
                    else {
                        // Rerender form
                        $data['password_err'] = 'Password incorrect';
                        // Load View
                        $this->view('users/login', $data);
                    } 
                } else {
                    $data['username_err'] = 'No such user was found.';
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data); 
            }

           /* // Make sure errors are empty
            if( empty($data['username_err']) && empty($data['password_err']) ) {
                // Validated
                die('SUCCESS');
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            } */
        }
        else {
            // Initiatlize data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];

            // Load View
            $this->view('users/login', $data);
        }
    } 

    public function createUserSession($user) {
        // regenerate session id
        session_regenerate_id();
        $_SESSION['userID'] = $user->userID;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['roleID'] = $user->roleID;
        $_SESSION['last_login'] = time();

        if ($user->roleID == 1) {
            $_SESSION['user_admin'] = "1";
            redirect('admins');
        } 
        else if ($user->roleID == 5) {
            $_SESSION['user_new'] = 5;
            redirect('main');
        }
    }

    public function logout() {
        unset($_SESSION['userID']);
        unset($_SESSION['user_username']);
        unset($_SESSION['roleID']);
        unset($_SESSION['last_login']);
        session_destroy();
        redirect('users/login');
    }

}





   /* public function createUserSession($user) {
        // regenerate session id
        //session_regenerate_id();
        $_SESSION['userID'] = $user->userID;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['user_group'] = $user->usergroup;
        $_SESSION['last_login'] = time();

    
        if($_SESSION['user_group'] === "1") {
            redirect('admin');
        }
        else if($_SESSION['user_group'] === "3") {
            redirect('main');
        } * works partially=
        
    }*/