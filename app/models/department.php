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

    public function countDepartments() {
        $this->db->query('SELECT count(*) AS totalDepts FROM tblDepartments');
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

    public function checkforChangesInCode($deptCode, $id) {
        $this->db->query('SELECT id, deptCode FROM tblDepartments WHERE id = :id AND deptCode = :deptCode'); 
        $this->db->bind(':id', $id);
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

    public function checkforChangesInName($id, $deptName) {
        $this->db->query('SELECT id, deptName FROM tblDepartments WHERE id = :id AND deptName = :deptName'); 
        $this->db->bind(':id', $id);
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

    public function updateDept($data) {
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




}

