<?php

class User {

    private $db;

    public function __construct() {
        $this->db = new Database;
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
