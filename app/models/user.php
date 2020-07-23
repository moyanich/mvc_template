<?php

class User {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registerUser($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)'); // Taking in a named parameter :email

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
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
