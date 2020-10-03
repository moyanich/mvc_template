<?php

class Job {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    /* SELECT QUERIES */

    // List all Jobs
    public function allJobs() {
        $this->db->query('SELECT tbljobs.id, jobDesc_path, job, tbldepartments.deptName FROM tbljobs 
        INNER JOIN tbldepartments ON tbljobs.relDeptID = tbldepartments.id ');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    /* SELECT QUERIES WITH CRITIERIA */

    // Check if job already exist in Department
    public function ValidateJob($job, $deptID) {
        $this->db->query('SELECT relDeptID, job FROM tbljobs LEFT JOIN tbldepartments ON 
        tbldepartments.id = tbljobs.relDeptID  WHERE relDeptID = :relDeptID AND job = :job'); 

        $this->db->bind(':job', $job);
        $this->db->bind(':relDeptID', $deptID);
        $row = $this->db->singleResult();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // Edit Job by ID
    public function editJob($id) {
        $this->db->query('SELECT tbljobs.id, tbljobs.relDeptID, tbljobs.jobDesc_path, tbljobs.job, tbldepartments.deptName FROM tbljobs 
        LEFT JOIN tbldepartments ON tbljobs.relDeptID = tbldepartments.id WHERE tbljobs.id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    }

    public function checkForDuplicateJob($job, $relDeptID, $id) {
        $this->db->query('SELECT * FROM tbljobs WHERE relDeptID = :relDeptID AND job = :job AND id != :id'); 
        $this->db->bind(':relDeptID', $relDeptID);
        $this->db->bind(':job', $job);
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




   /* public function getEmployeeByID($id) {
        $this->db->query('SELECT *, tbldepartments.id, tbldepartments.deptName FROM tblemployees 
        LEFT JOIN tbldepartments ON tblemployees.relDeptID = tbldepartments.id
        WHERE tblemployees.id = :id');


       // $this->db->query('SELECT * FROM tblEmployees WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    }  */


    /* SELECT QUERIES WITH CALCULATIONS */



    /* INSERT QUERIES */

    // Add job to table
    public function insertJob($data) {
        $this->db->query('INSERT INTO tbljobs (job, relDeptID, created_date) VALUES (:job, :relDeptID, :created_date)');
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':relDeptID', $data['relDeptID']); 
        $this->db->bind(':created_date', $data['created_date']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    // Add job to table with Attachment
    public function insertJobwithAttachment($data) {
        $this->db->query('INSERT INTO tbljobs (job, relDeptID, jobDesc_path, created_date) VALUES (:job, :relDeptID, :jobDesc_path, :created_date)');
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':relDeptID', $data['relDeptID']);
        $this->db->bind(':jobDesc_path', $data['jobDesc_path']);
        $this->db->bind(':created_date', $data['created_date']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    /* UPDATE QUERIES */

    // Update Job Table
    public function updateJob($data) {
        // Get existing post from model
        $this->db->query('UPDATE tbljobs SET 
            job = :job, 
            relDeptID = :relDeptID, 
            modified_date = :modified_date
            WHERE tbljobs.id = :id 
        ');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':relDeptID', $data['relDeptID']);
        $this->db->bind(':modified_date', $data['modified_date']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } 
    

    public function updateJobwithAttachment($data) {
        // Get existing post from model
        $this->db->query('UPDATE tbljobs SET 
            job = :job, 
            relDeptID = :relDeptID, 
            jobDesc_path = :jobDesc_path,
            modified_date = :modified_date
            WHERE tbljobs.id = :id 
        ');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':relDeptID', $data['relDeptID']);
        $this->db->bind(':jobDesc_path', $data['jobDesc_path']);
        $this->db->bind(':modified_date', $data['modified_date']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } 

    /* STORED PROCEDURES */

   

   

    /* DELETE QUERIES */

    public function deleteJob($id) {
        $this->db->query('DELETE FROM tbljobs WHERE id = :id ');
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }






    /*

   

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
    } */

    


    
}














    
    /* SELECT QUERIES */

     /* SELECT QUERIES WITH CRITIERIA */

    /* SELECT QUERIES WITH CALCULATIONS */

    /* INSERT QUERIES */


    /* UPDATE QUERIES */


    /* DELETE QUERIES */

    /* STORED PROCEDURES */
