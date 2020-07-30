<?php

class Department {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDepartments() {
        $this->db->query('SELECT * FROM tblDepartments');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function getDeptById($id) {
        $this->db->query('SELECT * FROM tblDepartments WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
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

    public function findDepartmentByCode($deptID) {
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

    
    public function updateDept($data) {
        // Get existing post from model
        $this->db->query('UPDATE tblDepartments SET deptID = :deptID, deptName = :deptName, modified_on = :modified_on WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':modified_on', $data['modified_on']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
       
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


