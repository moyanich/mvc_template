<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getEmployees() {
        $this->db->query(
            'SELECT idEmployee, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME, emp_no, hire_date, phone, job, tbldepartments.deptName
            FROM tblEmployees 
                LEFT JOIN tbldepartments
            ON tblEmployees.idDepartment_fk = tbldepartments.idDept');

        $results = $this->db->resultsGet();
        return $results;
    }


    public function getUserActivity() {
        $this->db->query(
            'SELECT 
            tblActivityLog.relUserID, users.userID, 
            tblActivityLog.action AS userAction, 
            tblActivityLog.timestamp AS updated,
            CONCAT_WS(" ", users.first_name, users.last_name) AS name
            FROM swiftdb.tblActivityLog
                RIGHT JOIN users
            ON tblActivityLog.relUserID = users.userID 
            ORDER BY updated DESC
                LIMIT 5
                ');

        $results = $this->db->resultsGet();
        return $results;
    }




}




 /* BEGIN Departments 

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

    public function editDept($data) {
       
    }  

   return false;
    }   

   */

    /* END Departments */