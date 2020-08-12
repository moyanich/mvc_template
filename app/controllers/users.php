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

                    // Check if user exists and create session
                    $this->createUserSession($loggedInUser);
                    
                    /* Check for user roles and redirect accordingly */
                    if ($loggedInUser) {
                        $_SESSION['user_name'] = $loggedInUser->username;

                        if($loggedInUser->roleID == 1) {
                            $_SESSION['user_admin'] = 1; 
                            // Update Session Log 
                            $this->userModel->sessionLog($_SESSION['userID'], $_SESSION['last_login'], date("Y-m-d H:i:s") ,'User Login'); 

                            flashMessage('login_sucess', 'Welcome ' . ucwords($_SESSION['user_name']) . '. Login Successful!'  , 'alert alert-success');
                            redirect('admins');
                        }
                        else if ($loggedInUser->roleID == 5) { 
                            $_SESSION['user_new'] = 5;

                            $this->userModel->sessionLog($_SESSION['userID'], $_SESSION['last_login'], date("Y-m-d H:i:s") ,'Login'); 
                            flashMessage('login_sucess', 'Login Successful!', 'alert alert-success');
                            redirect('main');
                        }
                        else {
                            flashMessage('login_failed', 'Login Failed!', 'alert alert-danger');
                            // Load view with flash message
                            $this->view('users/login', $data);
                        }
                    }
                    else {
                        // Rerender form
                        $data['password_err'] = 'Password incorrect';
                        // Load View
                        $this->view('users/login', $data);
                    } 
                } else {
                    //$data['username_err'] = 'No such user was found.';
                    flashMessage('invalid_credentials', 'Invalid username or password!', 'alert alert-danger');
                    // Load view with flash message
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
        $_SESSION['last_login'] = time();
    }

    public function logout() {
        unset($_SESSION['user']);
        unset($_SESSION['userID']);
        unset($_SESSION['last_login']);
        unset($SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

     /*public function logout() {
       $this->userModel->sessionLog($_SESSION['userID'], $_SESSION['last_login'], date("Y-m-d H:i:s") ,'User Logout'); */
       /* unset($_SESSION['userID']);
        unset($_SESSION['user_username']);
        unset($_SESSION['roleID']);
        unset($_SESSION['last_login']);
        unset($_SESSION['user_admin']);

        session_unset(); 
       
       
        session_destroy();
        redirect('users/login');
    } */





    public function getToken($length) {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i ++) {
            $token .= $codeAlphabet[$this->cryptoRandSecure(0, $max)];
        }
        return $token;
    }

    public function cryptoRandSecure($min, $max) {
        $range = $max - $min;
        if ($range < 1) {
            return $min; // not so random...
        }
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    

}





 /* O.G. Code **
// Check if user session already exists  WORKS!!!!!!!!!!!!!!!!
if ($loggedInUser) {
// $this->createCookies($loggedInUser);
        //Create session
    $this->createUserSession($loggedInUser);

}  

public function createUserSession($user) {
    // regenerate session id
    session_regenerate_id();
    $_SESSION['userID'] = $user->userID;
    //$_SESSION['user_name'] = $user->username;
    $_SESSION['last_login'] = time();
    //
   // $_SESSION['user'] = $user->username;
    //$_SESSION['roleID'] = $user->roleID;
   // $_SESSION['valid_user'] = 1;
    
    //$UIP = $_SERVER['REMOTE_ADDR']; // get the user ip

    /* O.G. Code **
    Create sessions for each user 
    Check if user is an administrator 
     
    if ($user->roleID == 1) {
        $_SESSION['user_admin'] = "1";   
        $this->userModel->sessionLog($_SESSION['userID'], $_SESSION['last_login'], date("Y-m-d H:i:s") ,'Login');  
        flashMessage('login_sucess', 'Login Successful!', 'alert alert-success');
        redirect('admins');
    } 
    Check if user is unassigned / Default User 
    else if ($user->roleID == 5) { 
        $_SESSION['user_new'] = 5;
        $this->userModel->sessionLog($_SESSION['userID'], $_SESSION['last_login'], date("Y-m-d H:i:s") ,'Login'); 
        redirect('main');
    } 
    
}

*/



/* 

    public function createCookies($user) {
       
        // Get Current date, time
        $current_time = time();
        $current_date = date("Y-m-d H:i:s", $current_time);

        // Set Cookie expiration for 1 month
        $cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month
        // Set Auth Cookies if 'Remember Me' checked
        if (! empty($_POST["remember"])) {

            setcookie("user_login", $user->username, $cookie_expiration_time);
            
            $random_password = $this->userModel->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);
            
            $random_selector = $this->userModel->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);
            
            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
            
            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
            
            // mark existing token as expired
            $userToken = $this->userModel->getTokenByUsername($user->username, 0);
            if (! empty($userToken[0]["id"])) {
                $this->userModel->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $this->userModel->insertToken($user->username, $random_password_hash, $random_selector_hash, $expiry_date);

            flashMessage('cookie_sucess', 'Cookies Set Successfully', 'alert alert-success');
        } else {
            $this->userModel->clearAuthCookie();
        }
        redirect('users/login');

    } 

    public function createCookies($user) {
        /* Set cookie if not remember me is clicked */
        // Get Current date, time
       /* $current_time = time();
        //$current_date = date("Y-m-d H:i:s", $current_time);

        // Set Cookie expiration for 1 month
        $cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

        if(!empty($_POST["remember"]) || $_POST["remember"]==1) {
            setcookie("user", $user->username, $cookie_expiration_time );
            setcookie("password", $user->password, $cookie_expiration_time );

           // setcookie('userid', $user->userID, $cookie_expiration_time );
            //setcookie('active', 1, $cookie_expiration_time);

            //$this->userModel->cookieLog($user->username, $user->password, $cookie_expiration_time);

            flashMessage('cookie_sucess', 'Cookies Set Successfully', 'alert alert-success');
        } 
    }
   
   
   
*/