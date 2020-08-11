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
        $this->db->query('SELECT * FROM users WHERE username = :username'); // Taking in a named parameter :email
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
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        $hashed_password = $row->password;
       
        if (password_verify($password, $hashed_password ) ) {
            return $row;
        } else {
            return false;
        }
    }  


    public function sessionLog($relUserID, $userSession, $timelog, $actionPerformed) {
        $this->db->query('INSERT INTO tblUserLogs (relUserID, userSession, timelog, actionPerformed, UIP) VALUES(:relUserID, :userSession, :timelog, :actionPerformed)'); 
        $this->db->bind(':relUserID', $relUserID);
        $this->db->bind(':userSession', $userSession);
        $this->db->bind(':timelog', $timelog);
        $this->db->bind(':actionPerformed', $actionPerformed);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }  

    public function cookieLog($relUsername, $password_hash, $selector_hash) {
        $this->db->query('INSERT INTO tbl_token_auth (relUsername, password_hash, selector_hash) VALUES(:relUsername, :password_hash, :selector_hash)'); 
        $this->db->bind(':relUsername', $relUsername);
        $this->db->bind(':password_hash', $password_hash);
        $this->db->bind(':selector_hash', $selector_hash);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

}
