<?php

class Department {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDepartments() {
        $this->db->query('SELECT * FROM tblDepartments');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function addDept($data) {
        $this->db->query('INSERT INTO tblDepartments (deptCode, deptName, created_by) VALUES (UPPER(:deptCode), :deptName, :created_by)');
        $this->db->bind(':deptCode', $data['deptCode']);
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':created_by', $data['created_by']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    public function editDept($data) {
        // Get existing post from model
        $this->db->query('UPDATE tblDepartments SET 
            deptCode = :deptCode, 
            deptName = :deptName, 
            modified_on = :modified_on 
            WHERE id = :id 
        ');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':deptCode', $data['deptCode']);
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':modified_on', $data['modified_on']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } 
    
    public function deleteDept($id) {
        $this->db->query('DELETE FROM tblDepartments WHERE id = :id');
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getLastID() {
        $this->db->query('SELECT * FROM tblDepartments ORDER BY id DESC LIMIT 3');
        $results = $this->db->resultsGet();
        return $results;
    }

    public function countDepartments() {
        $this->db->query('SELECT count(*) AS totalDepts FROM tblDepartments');
        $results = $this->db->resultsGet();
        return $results;
    } 

    public function findDepartmentByCode($deptCode) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptCode = :deptCode'); 
        $this->db->bind(':deptCode', $deptCode);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
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

    public function findDepartmentById($id) {
        $this->db->query('SELECT * FROM tblDepartments WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    }

    public function checkForDuplicateCode($deptCode, $id) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptCode = :deptCode AND id != :id'); 
        $this->db->bind(':deptCode', $deptCode);
        $this->db->bind(':id', $id);
        $row = $this->db->resultsGet();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function checkForDuplicateName($deptName, $id) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptName = :deptName AND id != :id'); 
        $this->db->bind(':deptName', $deptName);
        $this->db->bind(':id', $id);
        $row = $this->db->resultsGet();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    


    
}

