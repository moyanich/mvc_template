<?php

class Employee {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    public function countEmployees() {
        $this->db->query('SELECT count(*) AS totalEmployees FROM tblEmployees');
        $results = $this->db->resultsGet();
        return $results;
    } 

    public function getEmployees() {
        $this->db->query('SELECT * FROM tblEmployees');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function getEmployeeByID($id) {
        $this->db->query('SELECT * FROM tblEmployees WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    } 
   
    public function listGenders() {
        $this->db->query('SELECT * FROM tblgender');
        $results = $this->db->resultsGet();
        return $results; 
    } 
    

    public function addEmployee($data) {

        $this->db->query('INSERT INTO tblemployees (empID, first_name, middle_name, last_name, empDOB, retirementDate, gender, hire_date, created_date, created_by) VALUES (UPPER(:empID), :first_name, :middle_name, :last_name, :empDOB, :retirementDate, :gender, :hire_date, :created_date, :created_by)');

        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':empDOB', $data['empDOB']);
        $this->db->bind(':retirementDate', $data['retirementDate']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':hire_date', $data['hire_date']);
        $this->db->bind(':created_date', $data['created_date']);
        $this->db->bind(':created_by', $data['created_by']);
        if($this->db->execute()) {
            return true;
            print $id = $this->db->getLastID;
        } 
        return false;
    } 

    public function checkForDuplicateTRN($trn, $id) {
        $this->db->query('SELECT * FROM tblemployees WHERE trn = :trn AND id != :id'); 
        $this->db->bind(':trn', $trn);
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

    public function checkForDuplicateNIS($nis, $id) {
        $this->db->query('SELECT * FROM tblemployees WHERE nis = :nis AND id != :id'); 
        $this->db->bind(':nis', $nis);
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

    public function updateProfile($data) {
        $this->db->query('UPDATE tblemployees 
        SET
            first_name = :first_name,
            middle_name = :middle_name,
            last_name = :last_name,
            empDOB = :empDOB,
            gender = :gender,
            trn = :trn,
            nis = UPPER(:nis),
            phoneOne = :phoneOne,
            phoneTwo = :phoneTwo,
            externalEmail = LOWER(:externalEmail),
            address = :address,
            city = :city,
            parish = :parish,
            modified_at = :modified_at
        WHERE empID = :empID AND id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':empDOB', $data['empDOB']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':trn', $data['trn']);
        $this->db->bind(':nis', $data['nis']);
        $this->db->bind(':phoneOne', $data['phoneOne']);
        $this->db->bind(':phoneTwo', $data['phoneTwo']);
        $this->db->bind(':externalEmail', $data['externalEmail']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':parish', $data['parish']);
        $this->db->bind(':modified_at', $data['modified_at']); 
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    public function updateRetirementbyID($retirementDate, $data) {
        $this->db->query('UPDATE tblemployees SET retirementDate = :retirementDate
        WHERE id = :id');

        $this->db->bind(':retirementDate', $retirementDate);
        $this->db->bind(':id', $data['id']);
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 
   


   /* public function setNewRetirement($data) {
        $this->db->query('SELECT years AS DATEADD(:empDOB, INTERVAL years YEAR ) FROM tblretirement WHERE gender = :gender');
        $this->db->bind(':empDOB', $data['empDOB']);
        $this->db->bind(':gender', $data['gender']);
        $row = $this->db->singleResult();
        return $row;
       
    }  */
 




    
    



   /* public function addEmpRetirement($data) {
        $this->db->query('CALL addEmpRetirement(UPPER(:empID))');
        $this->db->bind(':empID', $data['empID']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } */



   // 


    

    



    public function addEmail($data) {
        $this->db->query('CALL insertEmail(UPPER(:empID), :empEmail, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':empEmail', $data['empEmail']);
        $this->db->bind(':created_date', $data['created_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
    
    public function addDept($data) {
        $this->db->query('CALL EmployeeDept(UPPER(:empID), :relDeptID, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':relDeptID', $data['relDeptID']);
        $this->db->bind(':created_date', $data['created_date']);
       
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function findEmpByID($empID) {
        $this->db->query('SELECT empID FROM tblemployees WHERE empID = :empID;'); 
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



}














/*

public function getEmployeebyID($id) {
        $this->db->query('SELECT * FROM tblEmployees INNER JOIN tblemails
        ON tblEmployees.empID = tblemails.relEmpID WHERE ID = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    } 

  public function getEmpDOB($id) {
        $this->db->query('SELECT empDOB FROM tblemployees WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    }
    public function getLastID() {
        $this->db->query('SELECT empID FROM tblemployees ORDER BY id LIMIT 1');
        
        $results = $this->db->resultsGet();
        return $results;
    }


    //INSERT INTO tblemployees(id, empID, title, first_name, last_name, middle_name, suffix, trn, nis, gender, photo, created_at, modified_at) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])s
 
 
 public function addEmployee($data) {
        $this->db->query('INSERT INTO tblemployees (empID, first_name, middle_name, last_name, gender, created_date) VALUES (:empID, :first_name, :middle_name, :last_name, :gender, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':last_name', $data['last_name']);
        
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':created_date', $data['created_date']);
       
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }  
    
      public function addEmployee($data) {
        $this->db->query('INSERT INTO tblemployees (empID, empTitle, first_name, middle_name, last_name, empDOB, gender, hire_date, created_date) VALUES (UPPER(:empID), :empTitle, :first_name, :middle_name, :last_name, :empDOB, :gender, :hire_date, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':empTitle', $data['empTitle']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':empDOB', $data['empDOB']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':hire_date', $data['hire_date']);

        


        $this->db->bind(':created_date', $data['created_date']);
       
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 
    
    */
