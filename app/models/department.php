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
      /* $this->db->query('SELECT *
        FROM tbldepartment'); */

        /*
        SELECT *, count(tbldepartment_employee.deptID) as total
        FROM tbldepartment
        LEFT JOIN tbldepartment_employee 
            ON tbldepartment.id = tbldepartment_employee.deptID
            where tbldepartment.id = tbldepartment_employee.deptID
         GROUP BY tbldepartment_employee.id


         SELECT tblemployees.empID, tblemployees.first_name, tblemployees.last_name, tblemployees.hire_date, tblemployees.retirementDate, tblemployees.gender, tbldepartment.name,
        tbljobtitles.title AS job
        FROM swiftdb2.tblemployees
            LEFT JOIN tbldepartment_employee ON tblemployees.empID = tbldepartment_employee.empID
            LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
            LEFT JOIN tbljobtitles ON tbljobtitles.id = tbldepartment_employee.jobID
        ORDER BY first_name ASC'


        SELECT CompanyName, ProductCount 
        FROM (SELECT CompanyName, COUNT(ProductName) AS ProductCount 
        FROM Suppliers 
        LEFT JOIN Products  ON Suppliers.SupplierID = Products.SupplierID  
        GROUP BY CompanyName) AS A WHERE ProductCount < 10

SELECT name, (SELECT COUNT(tbldepartment_employee.deptID)) AS total FROM tbldepartment LEFT JOIN tbldepartment_employee ON tbldepartment.id = tbldepartment_employee.deptID GROUP BY name
       
         */

        $this->db->query('SELECT tbldepartment.id, name, (SELECT COUNT(tbldepartment_employee.deptID)) AS total 
        FROM tbldepartment LEFT JOIN tbldepartment_employee ON tbldepartment.id = tbldepartment_employee.deptID GROUP BY id');


        $results = $this->db->resultsGet();
        return $results;  
    } 

    /**************************************
     *  SELECT QUERIES WITH CRITIERIA
    ****************************************/

    //Get Departments
    public function recentDepartments() {
        $this->db->query('SELECT * FROM tbldepartment ORDER BY id DESC LIMIT 5');
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

    public function checkIfDeptIDExists($id) {
        $this->db->query('SELECT * FROM tbldepartment WHERE id = :id'); 
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        if ($this->db->rowCount() >= 1) {
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


    public function updateSupervisor($data) {
        $this->db->query('UPDATE tbldepartment_supervisor SET 
        empID = :empID
        WHERE deptID = :id ');

        // Bind values
        $this->db->bind(':empID', $data['supID']);
        $this->db->bind(':deptID', $data['id']);

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







