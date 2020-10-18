<?php

/**
 * Users
 *
 * Long description for file (if any)...
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Amoy Nicholson <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id:$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */



class Users extends Controller {

    /**
     * Load model
     * Initiate the constructor
     */
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    private function setCookieExpiration() {
        // Get Current date, time
        $current_time = time();
        $current_date = date("Y-m-d H:i:s", $current_time);

        // Set Cookie expiration for 1 month
        //$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);

        // Set Cookie expiration for 1 day
        $cookie_expiration_time = $current_time + 86400;
        return $cookie_expiration_time;
    }

    private function getToken($length) {
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
    
    private function cryptoRandSecure($min, $max) {
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

    public function clearAuthCookie() {
        if (isset($_COOKIE["member_login"])) {
            setcookie("member_login", "");
        }
        if (isset($_COOKIE["random_password"])) {
            setcookie("random_password", "");
        }
        if (isset($_COOKIE["random_selector"])) {
            setcookie("random_selector", "");
        }
    }



    /**
     * Register User
     * Note that names of private properties or methods must be
     * preceeded by an underscore.
     * @var bool $_good
     */
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
    
        // If a POST REQUEST was made
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process Form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // GET data from Form
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'remember' => trim($_POST["remember"]),
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
            if(!empty($data['username']) && $this->userModel->findUserByUsername($data['username'])) {

                // Set logged in user
                $logInUser = $this->userModel->login($data['username'], $data['password']);

                // Logged in User exists
                if ($logInUser) {

                    // Create Session
                    $this->createSessionAfterLogin($logInUser);

                    //Log user activity
                    $this->userModel->logUserActivity($_SESSION['userID'], date("Y-m-d H:i:s"), 'User Login'); 

                    // Set Cookies if 'Remember Me' is checked
                    if (!empty($data['remember']) || $data['remember'] === 'on') {
                        
                        setcookie("member_login", $data['username'], $this->setCookieExpiration());

                        // Set Random Pass
                        $random_password = $this->getToken(16);
                        setcookie("random_password", $random_password, $this->setCookieExpiration());

                        // Set Random Selector
                        $random_selector = $this->getToken(32);
                        setcookie("random_selector", $random_selector, $this->setCookieExpiration());
                        
                        // Hash Pass and Selector
                        $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
                        $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

                        // Set Expiration Date
                        $expiry_date = date("Y-m-d H:i:s", $this->setCookieExpiration());

                        // Insert new token
                        $this->userModel->insertToken($data['username'], $logInUser->roleID, $random_selector_hash, $random_password_hash, $expiry_date);
                    }
                    else {
                        $this->clearAuthCookie();
                    }

                    // Create 
                    if($logInUser->roleID == 1) {
                        $this->createAdminSession();
                        // redirect the user to admin/dashboard page
                        flashMessage('login_success', 'Welcome ' . ucwords($data['username']) . '. Login Successful!'  , 'alert alert-success mt-5');
                        redirect('admin'); 
                    }
                    else if ($logInUser->roleID == 5) { 
                        $this->createRegisteredUserSession();
                        // redirect the user to main/index page
                        flashMessage('login_sucess', 'Welcome ' . ucwords($data['username']) . '. Login Successful!'  , 'alert alert-success');
                        redirect('main'); 
                    }
                    else {
                        flashMessage('login_failed', 'Login Failed!', 'alert alert-danger');
                        // Load view with flash message
                        $this->view('users/login', $data);
                    }
                }
            }
            else {
                // Load view with flash message
                flashMessage('invalid_credentials', 'Invalid username or password!', 'alert alert-danger');
                $this->view('users/login', $data);
            }
        }
        else {
            // Initiatlize data
            $data = [
                'username'      => '',
                'password'      => '',
                'remember'      => '',
                'username_err'  => '',
                'password_err'  => '',
            ];
            // Load the view
            $this->view('users/login', $data);
        }
    }

    /**
     * Check if loggedin session and redirect if session exists
     * 
    */
    public function userSessionExists() {

        // Get Current date, time
        $current_time = time();
        $current_date = date("Y-m-d H:i:s", $current_time);
        $isLoggedIn = false;

        if (!empty($_SESSION['userID'])) {
            $isLoggedIn = true;
        }
        // Check if loggedin session exists
        else if (!empty($_COOKIE["member_login"]) && !empty($_COOKIE["random_password"]) && !empty($_COOKIE["random_selector"])) {

            // Initiate auth token verification diirective to false
            $isPasswordVerified = false;
            $isSelectorVerified = false;
            $isExpiryDateVerified = false;

            // Get token for username
            $userToken = $this->userModel->getTokenByUsername($_COOKIE["member_login"], 0);

            // Validate random password cookie with database
            if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
                $isPasswordVerified = true;
            }

            // Validate random selector cookie with database
            if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
                $isSelectorVerified = true;
            }

            // check cookie expiration by date
            if($userToken[0]["expiry_date"] >= $current_date) {
                $isExpiryDateVerified = true;
            }
            // Redirect if all cookie based validation retuens true
            // Else, mark the token as expired and clear cookies
            if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDateVerified) {
              
                if ($userToken->relUserRoleID == 1) {
                    // redirect the user to admin/dashboard page
                    redirect('admins'); 
                }
                else if ($userToken->relUserRoleID == 5) {
                    // redirect the user to admin/dashboard page
                    redirect('main'); 
                }
            } else {
                if(!empty($userToken[0]["id"])) {
                    $this->userModel->markAsExpired($userToken[0]["id"]);
                }
                // clear cookies
                $this->clearAuthCookie();
            }
        }
    } 
    

    public function createSessionAfterLogin($user) {
        session_start();
        // regenerate session id
        session_regenerate_id();
        $_SESSION['login'] = true;
        $_SESSION['userID'] = $user->userID;
        $_SESSION['username'] = $user->username;
        $_SESSION['last_login'] = time();
    }
    
  
    /**
     * Create Admin Session
     */
    public function createAdminSession() {
        $_SESSION['user_admin'] = 1; 
    }

    /**
     * Create New Unregistered User Session
     */
    public function createRegisteredUserSession() {
        $_SESSION['user_new'] = 5;
    }
    

    /**
     * Logout User and Destroy Session
    */
    public function logout() {
        $this->userModel->logUserActivity($_SESSION['userID'], date("Y-m-d H:i:s"), 'User Logout'); 
        session_unset();
        session_destroy();
        redirect('users/login');
    }



}
