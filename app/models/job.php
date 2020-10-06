<?php

class Job {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    /**************************************
     *  SELECT QUERIES 
    ****************************************/
    // List all Jobs
    public function jobtitles() {
        $this->db->query('SELECT * FROM tbljobtitles');
        $results = $this->db->resultsGet();
        return $results;  
    }

    
    /**************************************
     *  SELECT QUERIES WITH CRITIERIA
    ****************************************/
    // Get Job by ID
    public function getJobByID($id) {
        $this->db->query('SELECT * FROM tbljobtitles WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;  
    }


    // Check if job exists in table
    public function checkJob($id) {
        $this->db->query('SELECT id FROM tbljobtitles 
        WHERE id = :id'); 
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

   

    /**************************************
     *  SELECT QUERIES WITH CALCULATIONS
    ****************************************/



    /**************************************
     *  INSERT QUERIES
    ****************************************/

    // Add job to table
    public function insertJob($data) {
        $this->db->query('INSERT INTO tbljobtitles (title, created_date, created_by) VALUES (:title, :created_date, :created_by)');
        $this->db->bind(':title', $data['job']);
        $this->db->bind(':created_date', $data['created_date']);
        $this->db->bind(':created_by', $data['created_by']);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    // Add job to table with Attachment
    public function insertJobwithAttachment($data) {
        $this->db->query('INSERT INTO tbljobtitles (title, jobDesc, created_date) VALUES (:title, :jobDesc, :created_date)');
        $this->db->bind(':title', $data['job']);
        $this->db->bind(':jobDesc', $data['jobDesc']);
        $this->db->bind(':created_date', $data['created_date']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 


    
    /**************************************
     *  UPDATE QUERIES 
    ****************************************/

    public function updateJob($data) {
        // Get existing post from model
        $this->db->query('UPDATE tbljobtitles SET 
            title = :title, 
            modified_date = :modified_date
            WHERE id = :id 
        ');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['job']);
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
        $this->db->query('UPDATE tbljobtitles SET 
            title = :title, 
            jobDesc = :jobDesc,
            modified_date = :modified_date
            WHERE id = :id 
        ');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['job']);
        $this->db->bind(':jobDesc', $data['jobDesc']);
        $this->db->bind(':modified_date', $data['modified_date']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } 

   
    /**************************************
     *  STORED PROCEDURES
    ****************************************/

    

    /**************************************
     *  DELETE QUERIES
    ****************************************/
    public function deleteJob($id) {
        $this->db->query('DELETE FROM tbljobtitles WHERE id = :id ');
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

}








/*
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


 // List all Jobs
   public function allJobs() {
       $this->db->query('SELECT tbljobs.id, jobDesc_path, job, tbldepartments.deptName FROM tbljobs 
        INNER JOIN tbldepartments ON tbljobs.relDeptID = tbldepartments.id '); 
      
        
        $results = $this->db->resultsGet();
        return $results;  
    }
    
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

    
    
    
    
    
    */



    /**************************************
     *  SELECT QUERIES 
    ****************************************/

    /**************************************
     *  SELECT QUERIES WITH CRITIERIA
    ****************************************/

    /**************************************
     *  SELECT QUERIES WITH CALCULATIONS
    ****************************************/

    /**************************************
     *  INSERT QUERIES
    ****************************************/


    /**************************************
     *  UPDATE QUERIES 
    ****************************************/


    /**************************************
     *  DELETE QUERIES
    ****************************************/

    /**************************************
     *  STORED PROCEDURES
    ****************************************/


