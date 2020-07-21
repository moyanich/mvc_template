<?php

 /* Add New User */
 protected function addUser($username, $password, $email, $group, $activation) { 
        
    //hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    //create the activation code
    $activation = md5(uniqid(rand(),true));

    $sql = "INSERT INTO users (username, password, email, `group`, active) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $passwordHash, $email, $group, $activation]);

    $id = $this->connect()->lastInsertId('user_id');
} 

 /* Fetch Username */ 
protected function getUser($username, $password) {

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue('username', $username);
    $stmt->execute([$username]);
    $results = $stmt->fetchAll();
    return $results; 

}


/*
protected function userExists($username, $email, $group) {

    try {
        $sql = "SELECT 1 FROM users WHERE username = ? OR email = ? AND group = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $group]);
        $results = $stmt->fetchAll();

       

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} */

protected function logSession($username, $password, $email, $group) { 
    
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    $sql = "INSERT INTO users (username, password, email, `group`) VALUES (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $passwordHash, $email, $group]);

    /*INSERT INTO `users`(`username`, `password`, `email`, `group`) VALUES ('samman', 'pass', 'sam@email.com', '2' ) */

} 

public function createUser($username, $password, $email, $group, $activation) {
    $results = $this->addUser($username, $password, $email, $group, $activation);
}






public function showUser($username, $password) {
    
    $results = $this->getUser($username, $password);

    foreach ($results as $result ) {
       // if (password_verify($password, $result['password'])) {
        if ($result['password']) {
           // $_SESSION['admin_session'] = $result['user_id'];
            //$_SESSION['csrf_token'] = $result['user_id'];

            // regenerate session id
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['admin_session'] = $results['user_id'];
            $_SESSION['last_login'] = time();
            
            return true;
            
        } else {
            return false;
        }
    }
}

/* public function userLoggedIn() {
    if(isset($_SESSION['admin_session'])) {
        return true;
    }
} */

public function is_logged_in() {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        return true;
    }
}



public function redirect($url) {
    header("Location: $url");
}

public function logout() {
    session_destroy();
    unset($_SESSION['admin_session']);
    return true;
}

public function validateEmail($email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);
    $results = $stmt->fetchAll();

    foreach($results as $row) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
            echo '<small><em>Email already exisits</em>. Please try another email or <a href="login.php">login into your account</a></small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }  
}

/*public function checkUsername($username) {

    if(strlen($username) < 3){
        echo '<div class="alert alert-warning alert-dismissible fade show mt-1" role="alert">';
            echo '<small>Username is too short.</small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    } 
}*/

public function checkPassword($password, $confirmpass) {
    
    if($password != $confirmpass) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
            echo '<small>Passwords do not match.</small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}

public function validateUsername($username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);
    $results = $stmt->fetchAll();

    foreach($results as $row) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
            echo '<small><em>Username</em> already exisits. Please try another username or <a href="login.php">login into your account</a></small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }  
}
}


if(isset($_POST['email'])) {   // Registration Form
$email = $_POST['email'];
$UserObj = new Validation();
$UserObj->validateEmail($email);
} 

if(isset($_POST['username'])) {   // Registration Form
$username = $_POST['username'];
$UserObj = new Validation();
$UserObj->validateUsername($username);
} 

if(isset($_POST['password']) ) {
$password = $_POST['password'];
$confirmpass = $_POST['passwordConfirm'];
$passObj = new Validation();
$passObj->checkPassword($password, $confirmpass);
}



/* public function addSession($user_id, $sess_token) {

    $results = $this->logSessions($user_id, $sess_token); 

} */

