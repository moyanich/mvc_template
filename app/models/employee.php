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

    public function addEmployee($data) {
        $this->db->query('INSERT INTO tblemployees (empID, first_name, last_name, relGender, created_date) VALUES (:empID, :first_name, :last_name, :relGender, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':relGender', $data['relGender']);
        $this->db->bind(':created_date', $data['created_date']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    


    //INSERT INTO tblemployees(id, empID, title, first_name, last_name, middle_name, suffix, trn, nis, relGender, photo, created_at, modified_at) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])s
}

