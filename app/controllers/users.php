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
                'remember' => trim($_POST["remember"]),
                'token' => trim($_POST["csrf_token"]),
                'username_err' => '',
                'password_err' => '',
            ];

            // Get Current date, time
            $current_time = time();
            $current_date = date("Y-m-d H:i:s", $current_time);

            // Set Cookie expiration for 1 month
            $cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

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
                    $this->createUserSession($loggedInUser);

                    // Check if remember me has been clicked
                    /*if(!empty($data['remember']) || $data['remember'] === 'on') {} */

                    // Check if user exists and create session 
                    if ($loggedInUser) {
                        
                        $_SESSION['user_name'] = $loggedInUser->username;

                        if (empty($_SESSION['userID']) && !empty($_COOKIE['remember'])) {
                            
                            list($selector, $data['token']) = explode(':', $_COOKIE['remember']);
                        
                            // GET TOKEN FROM DATABASE
                            $foundToken = $this->userModel->getToken($selector);
                        
                            if (hash_equals($foundToken['token'], $data['token'])) {
                                $_SESSION['userID'] = $foundToken['relUserID'];
                                // Then regenerate login token as above

                                die('succ');
                            } 
                           
                           
                        }

                        /*

                       if($loggedInUser->roleID == 1) {
                            $this->createAdminSession();

                            // Update Session Log 
                            //$this->userModel->userLog($_SESSION['userID'], date("Y-m-d H:i:s") ,'User Login'); 

                            if(!empty($data['remember']) || $data['remember'] === 'on') {

                                $selector = base64_encode(random_bytes(9));
                              
                                setcookie('remember', $selector,':'.$data['token'], $cookie_expiration_time);
                                setcookie('username', $loggedInUser->username, $cookie_expiration_time);
                                setcookie('password', $loggedInUser->password, $cookie_expiration_time);
                                setcookie('active', 1, $cookie_expiration_time);

                                $this->userModel->insertToken($_SESSION['userID'], $selector, $data['token'], date("Y-m-d H:i:s", $cookie_expiration_time), '1');
                            }

                            
                            // redirect the user to admin/dashboard page
                            flashMessage('login_sucess', 'Welcome ' . ucwords($_SESSION['user_name']) . '. Login Successful!'  , 'alert alert-success');

                            redirect('admins'); 

                        }
                        else if ($loggedInUser->roleID == 5) { 
                            $this->createRegisteredUserSession();
                           
                            //$this->userModel->userLog($_SESSION['userID'], $_SESSION['last_login'], date("Y-m-d H:i:s") ,'Login');
                            
                            // redirect the user to main/index page
                            flashMessage('login_sucess', 'Welcome ' . ucwords($_SESSION['user_name']) . '. Login Successful!'  , 'alert alert-success');
                            
                            redirect('main'); 
                        } */
                        else {
                            flashMessage('login_failed', 'Login Failed!', 'alert alert-danger');
                            // Load view with flash message
                            $this->view('users/login', $data);
                        }
                    }
                    else {
                        // Rerender form and Load View
                        flashMessage('invalid_credentials', 'Invalid username or password!', 'alert alert-danger');
                        $this->view('users/login', $data);
                    } 
                } else {
                    // Load view with flash message
                    flashMessage('invalid_credentials', 'Invalid username or password!', 'alert alert-danger');
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data); 
            }
        }
        else {
            // Initiatlize data
            $data = [
                'username' => '',
                'password' => '',
                'remember' => '',
                'token' => $this->create_token(),
                'username_err' => '',
                'password_err' => '',
            ];

            // Load View
            $this->view('users/login', $data);
        }
    } 

    /**
     * Create Secure Session
     * Generate a unique token
     * @return $token
     */
    public function createUserSession($user) {
        // regenerate session id
        session_regenerate_id();
        $_SESSION['login'] = true;
        $_SESSION['userID'] = $user->userID;
        $_SESSION['userRole'] = $user->roleID;
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
     * Logout User and Destroy Session and Cookies
     */
    public function logout() {
       // $this->userModel->userLog($_SESSION['userID'], date("Y-m-d H:i:s") ,'User Logout'); 
        session_destroy();

        $cookie_expiration_time = time() - 3600 * 24 * 30;
        setcookie('username', '' , $cookie_expiration_time);
        setcookie('password', '' , $cookie_expiration_time);
        setcookie('active', '', $cookie_expiration_time);

        redirect('users/login');
    }

    
    /**
     * Create CSRF Token
     * Generate a unique token
     * @return $token
     */
    public static function create_token() {
        // Generating a unique token
        $token = md5(uniqid(rand(), TRUE));
        $_SESSION['csrf_token'] = $token;
        $_SESSION['csrf_token_time'] = time();
        return $token;
    }

    /**
     * CSRF Token Time Validation
     * Block form requests after a 24 Hours
     * 
     */
    public static function validate_token($token) {      
        $max_time = 60*60*24; // in seconds
        if(isset($_SESSION['csrf_token_time'])) {
            $token_time = $_SESSION['csrf_token_time'];
            if(($token_time + $max_time) >= time() ){
            }else{
                $errors[] = "CSRF Token Expired";
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
            }
        }
    }



}

