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

}
