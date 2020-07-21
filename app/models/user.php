<?php

class User {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registerUser($data) {
        $this->db->query('INSERT INTO users (username, password, email) VALUES username = :username, password = :password, email = :email'); // Taking in a named parameter :email

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);

        $row = $this->db->resultSet();



    }


    public function checkUserUsername($username) {
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

    public function checkUserEmail($email) {
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



}
