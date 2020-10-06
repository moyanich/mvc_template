<?php

class Department {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    /**************************************
     *  SELECT QUERIES 
    ****************************************/

    //Get Departments
    public function getDepartments() {
       $this->db->query('SELECT *
        FROM tbldepartment');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    /**************************************
     *  SELECT QUERIES WITH CRITIERIA
    ****************************************/

    //Get Departments
    public function recentDepartments() {
        $this->db->query('SELECT *
         FROM tbldepartment ORDER BY id DESC LIMIT 5');
         $results = $this->db->resultsGet();
         return $results;  
    } 

    public function findDepartmentByID($id) {
        $this->db->query('SELECT * FROM tbldepartment WHERE id = :id'); 
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


    public function findDepartmentByName($name) {
        $this->db->query('SELECT * FROM tbldepartment WHERE name = :name'); 
        $this->db->bind(':name', $name);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function showDepartmentbyID($id) {
        $this->db->query('SELECT * FROM tbldepartment WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    }

   

    public function checkForDuplicateName($name, $id) {
        $this->db->query('SELECT * FROM tbldepartment WHERE name = :name AND id != :id'); 
        $this->db->bind(':name', $name);
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

    /**************************************
     *  SELECT QUERIES WITH CALCULATIONS
    ****************************************/

    public function countDepartments() {
        $this->db->query('SELECT count(*) AS totalDepts FROM tbldepartment');
        $results = $this->db->resultsGet();
        return $results;
    } 


    /**************************************
     *  INSERT QUERIES
    ****************************************/

    // Add Department
    public function addDept($data) {
        $this->db->query('INSERT INTO tbldepartment (id, name, created_date, created_by) 
        VALUES (:id, :name, :created_date, :created_by)');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':created_date', $data['created_date']);
        $this->db->bind(':created_by', $data['created_by']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }  
  

    /**************************************
     *  UPDATE QUERIES 
    ****************************************/

    // Update Department Table
    public function updateDept($data) {
        $this->db->query('UPDATE tbldepartment SET 
            id = :id, 
            name = :name, 
            modified_on = :modified_on 
            WHERE id = :id 
        ');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':modified_on', $data['modified_on']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } 
   

    /**************************************
     *  DELETE QUERIES
    ****************************************/

    public function deleteDept($id) {
        $this->db->query('DELETE FROM tbldepartment WHERE id = :id');
        $this->db->bind(':id', $id);
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

    


    
}













    


// OLD CODE

   /**************************************
     *  SELECT QUERIES 
    ****************************************/

    //Get Departments
   /* public function getDepartments() {
        $this->db->query('SELECT *
         FROM tbldepartment');
         $results = $this->db->resultsGet();
         return $results;  
     } 
 
     /* $this->db->query('SELECT tblDepartments.id, tblDepartments.deptCode, tblDepartments.deptName, tblemployees.id, tblemployees.first_name, tblemployees.last_name 
     FROM tblDepartments 
     lEFT JOIN tblemployees ON tblDepartments.relSupID = tblemployees.id */
 
     //tblSupervisor
     //OR tblDepartments.relManagerID = tblemployees.id
 
     /**************************************
      *  SELECT QUERIES WITH CRITIERIA
     ****************************************/
 
    /*  public function getLastID() {
         $this->db->query('SELECT * FROM tblDepartments ORDER BY id DESC LIMIT 3');
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
     } */
 
 
     /**************************************
      *  SELECT QUERIES WITH CALCULATIONS
     ****************************************/
 
     /* public function countDepartments() {
         $this->db->query('SELECT count(*) AS totalDepts FROM tbldepartment');
         $results = $this->db->resultsGet();
         return $results;
     } 
 
 
     /**************************************
      *  INSERT QUERIES
     ****************************************/
 
     // Add Department
     /*public function addDept($data) {
         $this->db->query('INSERT INTO tblDepartments (deptCode, deptName, relSupID, relManagerID, created_by) 
         VALUES (UPPER(:deptCode), :deptName, :relSupID, :relManagerID, :created_by)');
         $this->db->bind(':deptCode', $data['deptCode']);
         $this->db->bind(':deptName', $data['deptName']);
         $this->db->bind(':relSupID', $data['relSupID']);
         $this->db->bind(':relManagerID', $data['relManagerID']);
         $this->db->bind(':created_by', $data['created_by']);
 
         if($this->db->execute()) {
             return true;
         } 
         return false;
     }  */
 
 
     /**************************************
      *  UPDATE QUERIES 
     ****************************************/
 
     // Update Department Table
     /* public function editDept($data) {
         // Get existing post from model
         $this->db->query('UPDATE tblDepartments SET 
             deptCode = :deptCode, 
             deptName = :deptName, 
             relSupID = :relSupID,
             relManagerID = :relManagerID,
             modified_on = :modified_on 
             WHERE id = :id 
         ');
 
         // Bind values
         $this->db->bind(':id', $data['id']);
         $this->db->bind(':deptCode', $data['deptCode']);
         $this->db->bind(':deptName', $data['deptName']);
         $this->db->bind(':relSupID', $data['relSupID']);
         $this->db->bind(':relManagerID', $data['relManagerID']);
         $this->db->bind(':modified_on', $data['modified_on']);
 
         // Execute
         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
     } 
     */
 
     /**************************************
      *  DELETE QUERIES
     ****************************************/
 
    /* public function deleteDept($id) {
         $this->db->query('DELETE FROM tblDepartments WHERE id = :id');
         $this->db->bind(':id', $id);
         // Execute
         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
     } */
 
 
     /**************************************
      *  STORED PROCEDURES
     ****************************************/