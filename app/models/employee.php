<?php

class Employee {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    public function getEmployees() {
        $this->db->query('SELECT * FROM tblEmployees');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    


    
}

