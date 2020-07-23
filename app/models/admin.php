<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDepartments() {
        $this->db->query('SELECT * FROM tblDepartment');
        $results = $this->db->resultsGet();
        return $results;
    } 

    
    

}
