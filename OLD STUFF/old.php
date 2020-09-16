
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

            // Validate Username
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter a username';
            }
            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } 

            //Validate Token
            if($data['token'] === $_SESSION['csrf_token']){
            }else{
                flashMessage('token_mismatch', 'Problem with CSRF Token Validation', 'alert alert-danger');
            }

           


            // Check if username field is not empty, then check if user exists
            if(!empty($data['username'])) {
                
                if($this->userModel->findUserByUsername($data['username'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                    $this->createSessionAfterLogin($loggedInUser);

                    // Check if remember me has been clicked
                    /*if(!empty($data['remember']) || $data['remember'] === 'on') {} */

                    // Check if user exists and create session 
                    if ($loggedInUser) {
                        
                        $_SESSION['user_name'] = $loggedInUser->username;

                        if (empty($_SESSION['userID']) && !empty($_COOKIE['remember'])) {
                            
                        
                        if($loggedInUser->roleID == 1) {
                            $this->createAdminSession();

                            // Update Session Log 
                            //$this->userModel->userLog($_SESSION['userID'], date("Y-m-d H:i:s") ,'User Login'); 

                            if(!empty($data['remember']) || $data['remember'] === 'on') {

                                
                                $selector = base64_encode(random_bytes(9));
                                $cok = $this->createCookie($selector, $data['token'], $data['username'], $_SESSION['userID']);

                                //$this->userModel->insertToken($_SESSION['userID'], $selector, $data['token'], date("Y-m-d H:i:s", $cookie_expiration_time), '1');
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
                        } 

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

    public function createCookie($selector, $token, $user, $userID) {
        // Get Current date, time
        $current_time = time();
        $current_date = date("Y-m-d H:i:s", $current_time);
        // Set Cookie expiration for 1 month
        $cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month
        
        setcookie('remember', $selector,':'.$token, $cookie_expiration_time);
        setcookie('username', $user, $cookie_expiration_time);
        setcookie('userid', $userID, $cookie_expiration_time);
        setcookie('active', 1, $cookie_expiration_time);
    }

    public function decodeCookie($selector, $token) {
        $cookie = $_COOKIE['remember'];
        $content = base64_decode($cookie);
        list($selector, $data['token']) = explode(':', $_COOKIE['remember']);
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
            } else{
                $errors[] = "CSRF Token Expired";
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
            }
        }
    }



}












------------------





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

            // Validate Username
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter a username';
            }
            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } 

            //Validate Token
            if($data['token'] === $_SESSION['csrf_token']){
            }else{
                flashMessage('token_mismatch', 'Problem with CSRF Token Validation', 'alert alert-danger');
            }

           


            // Check if username field is not empty, then check if user exists
            if(!empty($data['username'])) {
                
                if($this->userModel->findUserByUsername($data['username'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                    $this->createSessionAfterLogin($loggedInUser);

                    // Check if remember me has been clicked
                    /*if(!empty($data['remember']) || $data['remember'] === 'on') {} */

                    // Check if user exists and create session 
                    if ($loggedInUser) {
                        
                        $_SESSION['user_name'] = $loggedInUser->username;

                        if (empty($_SESSION['userID']) && !empty($_COOKIE['remember'])) {
                            
                            
                        
                            // GET TOKEN FROM DATABASE
                            /*$foundToken = $this->userModel->getToken($selector);
                        
                            if (hash_equals($foundToken['token'], $data['token'])) {
                                $_SESSION['userID'] = $foundToken['relUserID'];
                                // Then regenerate login token as above

                                die('succ');
                            } 
                           
                           
                        } */

                        

                        if($loggedInUser->roleID == 1) {
                            $this->createAdminSession();

                            // Update Session Log 
                            //$this->userModel->userLog($_SESSION['userID'], date("Y-m-d H:i:s") ,'User Login'); 

                            if(!empty($data['remember']) || $data['remember'] === 'on') {

                                
                                $selector = base64_encode(random_bytes(9));
                                $cok = $this->createCookie($selector, $data['token'], $data['username'], $_SESSION['userID']);

                                //$this->userModel->insertToken($_SESSION['userID'], $selector, $data['token'], date("Y-m-d H:i:s", $cookie_expiration_time), '1');
                            }

                            
                            // redirect the user to admin/dashboard page
                            flashMessage('login_sucess', 'Welcome ' . ucwords($_SESSION['user_name']) . '. Login Successful!'  , 'alert alert-success');

                            redirect('admins'); 

                        } /*
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
    public function createSessionAfterLogin($user) {
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

    public function createCookie($selector, $token, $user, $userID) {
        // Get Current date, time
        $current_time = time();
        $current_date = date("Y-m-d H:i:s", $current_time);
        // Set Cookie expiration for 1 month
        $cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month
        
        setcookie('remember', $selector,':'.$token, $cookie_expiration_time);
        setcookie('username', $user, $cookie_expiration_time);
        setcookie('userid', $userID, $cookie_expiration_time);
        setcookie('active', 1, $cookie_expiration_time);
    }

    public function decodeCookie($selector, $token) {
        $cookie = $_COOKIE['remember'];
        $content = base64_decode($cookie);
        list($selector, $data['token']) = explode(':', $_COOKIE['remember']);
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
            } else{
                $errors[] = "CSRF Token Expired";
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
            }
        }
    }



}




<?php /*

<div class="col-12 col-md-5 pr-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empNo">Employee Number:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="empID" class="form-control text-uppercase <?php echo (!empty($data['empID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empID']; ?>" />
                            <?php echo (!empty($data['empID_err'])) ? '<span class="invalid-feedback">' . $data['empID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="department">Department:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">

                            <select name="relDeptID" class="custom-select <?php echo (!empty($data["relDeptID_err"])) ? 'is-invalid check' : '' ; ?>">
                                <option value='0' selected>Select Department</option>
                                <?php
                                    foreach ($data['departments'] as $dept ) {
                                        echo '<option class="" value="' . $dept->id . '">' . $dept->deptName  . '</option>';
                                        echo (!empty($data['relDeptID_err'])) ? '<span class="invalid-feedback">' . $data['relDeptID_err'] . '</span>' : '' ; 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                







foreach ($data['genders'] as $gender ) { ?>
                                <div class="form-check">
                                    <input type="radio" name="gender" id="<?php echo $gender->genderName; ?>" value="<?php echo $gender->genderName; ?>" class="form-check-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid check' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                                    <label class="form-check-label" for="<?php echo $gender->genderName; ?>"><?php echo $gender->genderName ?></label>
                                    <?php echo (!empty($data['gender_err'])) ? '<div class="invalid-feedback">' . $data['gender_err'] . '</div>' : '' ; ?>
                                </div>

                            <?php } */ ?>







<?php /* <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" name="gender" id="<?php echo $gender->genderName; ?>" value="<?php echo $gender->genderName; ?>" class="custom-control-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid check' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
    <?php echo (!empty($data['gender_err'])) ? '<div class="invalid-feedback">' . $data['gender_err'] . '</div>' : '' ; ?>
    <label class="custom-control-label" for="<?php echo $gender->genderName; ?>"><?php echo $gender->genderName ?></label> 
</div>*/?>


<?php /*

<div class="form-group">
                        <label for="gender">DOB:(MM/DD/YYYY)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" value="2011-08-19">
                    </div>

 <form  name="addEmployee" action="<?php echo URLROOT; ?>/employees/add" method="POST">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Personal Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myEmployeeTab">
                    <div class="tab-pane fade show active  pt-4" id="details" role="tabpanel" aria-labelledby="details-tab">
                    
                      
                            <div class="row">
                                <!-- COLUMN-1 -->
                                <div class="col">

                                <fieldset><h2>Step 1: Create your account</h2>

                                    <div class="form-group">
                                        <label for="firstName" class="">First Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control" id="firstName">
                                    </div>

                                    <div class="form-group">
                                        <label for="lasttName">Last Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="lname" class="form-control" id="lasttName">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:<span class="text-danger">*</span></label>
                                        <input type="email" name="empEmail" class="form-control" id="emailAddress">
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">DOB:<span class="text-danger">*</span></label>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Gender:<span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="gender" id="male" class="custom-control-input">
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="female">Female</label>
                                        </div>
                                    </div>


                                    </fieldset>
                                    
                                    
                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">

                                    </div>


                                    <input type="button" name="password" class="next btn btn-info" value="Next" />

                                   
                                    
                                    
                                </div>


                                <!-- COLUMN-2 -->
                                <div class="col">

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Employee Number:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <input type="text" name="empNo" class="form-control" id="empNo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Department:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            
                                            <select name="roleID" class="custom-select">
                                                <option value='0' selected>Department</option>
                                                <?php
                                                    foreach ($data['department'] as $role ) {
                                                        echo '<option value="' . $role->roleID . '">' . $role->roleName . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        



                                        </div>
                                    </div>
                                    
                                    col 2
                                </div>


                            </div>
                            
                            



                        
                        




                       
                    
                    
                    </div>




                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" />


                    </div>








                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>

            

                        </form>



                                <!-- COLUMN-2 -->
                                <div class="col">

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Employee Number:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <input type="text" name="empNo" class="form-control" id="empNo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Department:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            
                                            <select name="roleID" class="custom-select">
                                                <option value='0' selected>Department</option>
                                                <?php
                                                    foreach ($data['department'] as $role ) {
                                                        echo '<option value="' . $role->roleID . '">' . $role->roleName . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        



                                        </div>
                                    </div>

                                    col 2
                                    </div>












 <select name="gender" class="gender form-control">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>


<div class="form-group">
					<label for="inputdeptCode">Employee ID<sup>*</sup></label>
					<input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>" value="<?php echo $data['deptCode']; ?>" placeholder="Department Code"/>
					<?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>
				</div> 

			<div class="form-group">
					<label for="inputdeptName">Department Name<sup>*</sup></label>
					<input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name" />
					<?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
				</div>

				<div class="form-group">
					<div class="col-lg-12 p-t-20 text-center">
						<a href="<?php echo URLROOT; ?>/emplpoyees" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
						<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Submit" />
					</div>
				</div>
				
				
				

            
			
		 <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" type="email" class="validate form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Joining Date" data-dtp="dtp_ccoZY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <div class="select-wrapper"><input class="select-dropdown dropdown-trigger" type="text" readonly="true" data-target="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a0"><ul id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a0" class="dropdown-content select-dropdown" tabindex="0"><li class="disabled selected" id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a00" tabindex="0"><span>Gender</span></li><li id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a01" tabindex="0"><span>Male</span></li><li id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a02" tabindex="0"><span>Female</span></li></ul><svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg><select class="col-12 m-t-20 p-l-0" tabindex="-1">
                                                <option disabled="" selected="">Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Birth Date" data-dtp="dtp_o05Ha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-md-3">Upload Your Profile Photo</label>
                                    <form action="/" id="frmFileUpload" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                            <em>(This is just a demo dropzone. Selected files are
                                                <strong>not</strong>
                                                actually uploaded.)</em>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="button" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                            </div>
                        </div>


*/ ?>
	