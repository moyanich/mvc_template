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

    public function allEmployees() {
        $this->db->query('SELECT * FROM tblEmployees');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function genders() {
        $this->db->query('SELECT gender FROM tblgenders');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function addEmployee($data) {
        $this->db->query('INSERT INTO tblemployees (empID, first_name, middle_name, last_name, relGender, created_date) VALUES ((UPPER(:empID), :first_name, :middle_name, :last_name, :relGender, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':last_name', $data['last_name']);


        
        $this->db->bind(':relGender', $data['relGender']);
        $this->db->bind(':created_date', $data['created_date']);
       
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    public function addEmail($data) {
        $this->db->query('CALL insertEmail(:empID, :empEmail, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':empEmail', $data['empEmail']);
        $this->db->bind(':created_date', $data['created_date']);
       
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
    
    
    public function findEmpByID($empID) {
        $this->db->query('SELECT empID FROM tblemployees WHERE empID = :empID;'); // Taking in a named parameter :email
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    


    //INSERT INTO tblemployees(id, empID, title, first_name, last_name, middle_name, suffix, trn, nis, relGender, photo, created_at, modified_at) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])s
}

