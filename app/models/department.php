<?php

class Department {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDepartments() {
        $this->db->query('SELECT deptID, deptName FROM tblDepartments');
        
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function findDepartmentByName($deptName) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptName = :deptName'); 
        $this->db->bind(':deptName', $deptName);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function findDepartmentByID($deptID) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptID = :deptID'); 
        $this->db->bind(':deptID', $deptID);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getDeptById($deptID) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptID = :deptID');
        $this->db->bind(':deptID', $deptID);
        $row = $this->db->singleResult();
        return $row;
    }
    
    public function editDept($deptID) {

        // Get existing post from model
        


       
    }  

    public function addDept($data) {
        $this->db->query('INSERT INTO tblDepartment (deptCode, deptName) VALUES(:deptName, :deptCode)'); 
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':deptCode', $data['deptCode']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }   

   

    /* END Departments */



}


