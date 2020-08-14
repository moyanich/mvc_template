<?php

class User {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registerUser($data) {
        $this->db->query('INSERT INTO users (username, password, email, `roleID`) VALUES(:username, :password, :email, :roleID)'); // Taking in a named parameter :email

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':roleID', $data['roleID']);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function getUserRoles() {
        $this->db->query('SELECT * FROM tblrole ORDER BY roleID ASC'); // Taking in a named parameter :email
        $results = $this->db->resultsGet();
        return $results;  
    }

    public function validateUserRole($roleID) {
        $this->db->query('SELECT * FROM tblrole WHERE roleID = :roleID'); 
        $this->db->bind(':roleID', $roleID);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :username'); // Taking in a named parameter :email
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }


    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email'); // Taking in a named parameter :email
        $this->db->bind(':email', $email);

        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        $hashed_password = $row->password;
       
        if (password_verify($password, $hashed_password ) ) {
            return $row;
        } else {
            return false;
        }
    }

    public function userLog($relUserID, $timelog, $actionPerformed) {
        $this->db->query('INSERT INTO tblUserLogs (relUserID, timelog, actionPerformed) VALUES(:relUserID, :timelog, :actionPerformed)'); 
        $this->db->bind(':relUserID', $relUserID, PDO::PARAM_INT);
        $this->db->bind(':timelog', $timelog);
        $this->db->bind(':actionPerformed', $actionPerformed, PDO::PARAM_STR);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 
    
    function insertToken($relUseID, $random_selector_hash, $token, $expires, $is_expired) {
        $this->db->query('INSERT INTO tbl_token_auth (relUseID, selector, token, expires, is_expired) values (:relUseID, :selector_hash, :token, :expires, :is_expired)');
        $this->db->bind(':relUseID', $relUseID, PDO::PARAM_INT);
        $this->db->bind(':selector_hash', $random_selector_hash, PDO::PARAM_STR);
        $this->db->bind(':token', $token, PDO::PARAM_STR);
        $this->db->bind(':expires', $expires);
        $this->db->bind(':is_expired', $is_expired, PDO::PARAM_INT);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    function getToken($random_selector_hash) {
        $this->db->query('SELECT * FROM tbl_token_auth WHERE selector = :selector'); // Taking in a named parameters
        $this->db->bind(':selector', $random_selector_hash);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }



    /*

    

    

    function markAsExpired($tokenId) {
        $this->db->query('UPDATE tbl_token_auth SET is_expired = :is_expired WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $tokenId, PDO::PARAM_INT);
        $this->db->bind(':is_expired', 1, PDO::PARAM_INT);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } */

   




    

   
}
