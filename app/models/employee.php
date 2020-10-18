<?php

class Employee {

    private $db;

    public $id = null;

    public function __construct() {
        $this->db = new Database;
    }

    /****************************************
     *  SELECT QUERIES 
    ****************************************/

    // List all Employees
    /*public function getEmployees() {
        $this->db->query('SELECT * FROM tblEmployees ORDER BY first_name ASC');
        $results = $this->db->resultsGet();
        return $results;  
    }  */

    public function getEmployees() {
        $this->db->query('SELECT tblemployees.empID, tblemployees.first_name, tblemployees.last_name, tblemployees.hire_date, tblemployees.retirementDate, tblemployees.gender, tbldepartment.name,
        tbljobtitles.title AS job
        FROM swiftdb2.tblemployees
            LEFT JOIN tbldepartment_employee ON tblemployees.empID = tbldepartment_employee.empID
            LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
            LEFT JOIN tbljobtitles ON tbljobtitles.id = tbldepartment_employee.jobID
        ORDER BY first_name ASC');

        $results = $this->db->resultsGet();
        return $results;  
    } 

    // List all Genders
    public function listGenders() {
        $this->db->query('SELECT * FROM tblgender');
        $results = $this->db->resultsGet();
        return $results; 
    } 

    /****************************************
     *  SELECT QUERIES WITH CALCULATIONS
    ****************************************/

    // Count the total number of employees
    public function countEmployees() {
        $this->db->query('SELECT count(*) AS totalEmployees FROM tblEmployees');
        $results = $this->db->resultsGet();
        return $results;
    } 

    public function getEmployeeByID($empID) {
        $this->db->query('SELECT * FROM tblemployees
        LEFT JOIN tbldepartment_employee ON tblemployees.empID = tbldepartment_employee.empID
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        LEFT JOIN tbljobtitles ON tbljobtitles.id = tbldepartment_employee.jobID
        LEFT JOIN tbladdress_employee ON tblemployees.empID = tbladdress_employee.empID
        LEFT JOIN tblparish ON tbladdress_employee.ParishID = tblparish.id
        WHERE tblemployees.empID = :empID
        ORDER BY tbldepartment_employee.from_date DESC 
        
        ');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    }
    
    public function getEmpJobHistory($empID) {
        $this->db->query('SELECT empID, tbljobtitles.title, tbldepartment_employee.id,
        tbldepartment_employee.jobID, tbldepartment_employee.deptID, tbldepartment.name, tbldepartment_employee.from_date, tbldepartment_employee.to_date
        FROM tbldepartment_employee 
        LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        WHERE tbldepartment_employee.empID = :empID  
        ORDER BY tbldepartment_employee.from_date DESC');
        $this->db->bind(':empID', $empID);
        $row = $this->db->resultsGet();
        return $row;
    }

    public function getJobByID($id) {
        $this->db->query('SELECT empID, tbldepartment_employee.id,
        tbldepartment_employee.jobID, tbldepartment_employee.deptID, tbldepartment.name, tbldepartment_employee.from_date, tbldepartment_employee.to_date,
        tbljobtitles.title
        FROM tbldepartment_employee 
        LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        WHERE tbldepartment_employee.id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->singleResult();
        return $row;
    }


    // Find dupliate Employee ID
    public function findDuplicateEmpID($empID) {
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

    // Find dupliate TRN Numbers
    public function checkForDuplicateTRN($trn, $empID) {
        $this->db->query('SELECT * FROM tblemployees WHERE trn = :trn AND empID != :empID'); 
        $this->db->bind(':trn', $trn);
        $this->db->bind(':empID', $empID);
        $row = $this->db->resultsGet();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    // Find dupliate NIS Numbers
    public function checkForDuplicateNIS($nis, $empID) {
        $this->db->query('SELECT * FROM tblemployees WHERE nis = :nis AND empID != :empID'); 
        $this->db->bind(':nis', $nis);
        $this->db->bind(':empID', $empID);
        $row = $this->db->resultsGet();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function checkJobTitle($id, $empID) {
        $this->db->query('SELECT empID, jobID, deptID, from_date, to_date from  tbldepartment_employee
        LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
        WHERE title = "Supervisor" AND empID = :empID AND tbldepartment_employee.id = :id'); 
        $this->db->bind(':id', $id);
        $this->db->bind(':empID', $empID);
        $row = $this->db->resultsGet();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }


    // Check if Supervisor exists in table
    public function checkIfSupervisorExist($data) {
        $this->db->query('SELECT empID, deptID FROM tbldepartment_supervisor
        WHERE empID = :empID AND deptID = :deptID');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    // Check if Manager exists in table
    public function checkIfManagerExist($data) {
        $this->db->query('SELECT empID, deptID FROM tbldepartment_manager
        WHERE empID = :empID AND deptID = :deptID');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }


    // Department Supervisor
    public function reportsToSupervisor($deptID) {
        $this->db->query('SELECT tbldepartment_supervisor.empID, tbldepartment_supervisor.deptID, tblemployees.first_name, tblemployees.last_name  
        FROM tbldepartment_supervisor 
        LEFT JOIN tblemployees ON tbldepartment_supervisor.empID = tblemployees.empID
        WHERE tbldepartment_supervisor.deptID = :deptID
        ORDER BY tbldepartment_supervisor.from_date DESC LIMIT 1');
        $this->db->bind(':deptID', $deptID);
        $row = $this->db->resultsGet();
        return $row;
    }

    // Department Manager
    public function reportsToManager($deptID) {
        $this->db->query('SELECT tbldepartment_manager.empID, tbldepartment_manager.deptID, tblemployees.first_name, tblemployees.last_name  
        FROM tbldepartment_manager
        LEFT JOIN tblemployees ON tbldepartment_manager.empID = tblemployees.empID
        WHERE tbldepartment_manager.deptID = :deptID
        ORDER BY tbldepartment_manager.from_date DESC LIMIT 1');
        $this->db->bind(':deptID', $deptID);
        $row = $this->db->resultsGet();
        return $row;
    }

    /**************************************
     *  INSERT QUERIES
    ****************************************/

    // Insert Employee
    public function addEmployee($data) {
        $this->db->query('INSERT INTO tblemployees (empID, first_name, middle_name, last_name, empDOB, retirementDate, gender, hire_date, created_date, created_by) VALUES (:empID, :first_name, :middle_name, :last_name, :empDOB, :retirementDate, :gender, :hire_date, :created_date, :created_by)');

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
        } 
        return false;
    } 

    // Insert Employee job History
    public function insertJob($data) {
        $this->db->query('INSERT INTO tbldepartment_employee (empID, jobID, deptID, from_date, to_date,  created_date, created_by) 
        VALUES (:empID, :jobID, :deptID, :from_date, :to_date, :created_date, :created_by)');

        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':jobID', $data['jobID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        $this->db->bind(':created_date', $data['created_date']); 
        $this->db->bind(':created_by', $data['created_by']); 
                   
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }  

    // Add Supervisor to table
    public function addSupervisors($data) {
        $this->db->query('INSERT INTO tbldepartment_supervisor (empID, deptID, from_date, to_date) 
        VALUES (:empID, :deptID, :from_date, :to_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }


     // Add Manager to table
     public function addManagers($data) {
        $this->db->query('INSERT INTO tbldepartment_manager (empID, deptID, from_date, to_date) 
        VALUES (:empID, :deptID, :from_date, :to_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 


    /***************************************
     *  UPDATE QUERIES 
    ****************************************/  

    // Update Employee Profile
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
            mobile = :mobile,
            externalEmail = LOWER(:externalEmail),
            modified_at = :modified_at
        WHERE empID = :empID');

        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':empDOB', $data['empDOB']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':trn', $data['trn']);
        $this->db->bind(':nis', $data['nis']);
        $this->db->bind(':phoneOne', $data['phoneOne']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':externalEmail', $data['externalEmail']);
        $this->db->bind(':modified_at', $data['modified_at']); 
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    
    public function addressExists($empID) {
        $this->db->query('SELECT empID FROM tbladdress_employee WHERE empID = :empID');
        $this->db->bind(':empID', $empID);
        $row = $this->db->resultsGet();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    





    public function insertAddress($data) {
        $this->db->query('INSERT INTO tbladdress_employee(empID, address, city, parishID, created_at) 
        VALUES(:empID, :address, :city, :parishID, :created_at)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':parishID', $data['parish']);
        $this->db->bind(':created_at', $data['created_at']);
        if($this->db->execute()) {
            return true;
        } 
        return false;


    } 

    
    public function updateAddress($data) {
        $this->db->query('UPDATE tbladdress_employee SET
        address = :address, 
        city = :city,
        parishID = :parishID,
        modified_at = :modified_at
        WHERE empID = :empID');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':parishID', $data['parish']);
        $this->db->bind(':modified_at', $data['modified_at']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 


      /*
    

    IF EXISTS (SELECT * FROM tbladdress_employee WHERE relEMPID = empID)
    BEGIN
    UPDATE tbladdress_employee SET
    address = address, city = city, parishID = parish, modified_at = modified_at
    WHERE relEMPID = empID;
    END
ELSE
    BEGIN

      INSERT INTO tbladdress_employee(relEMPID, address, city, parishID, created_date) VALUES (empID, address, city, parishID, created_at);
  
  
END



*/
            

        

    
    // Update Company Profile
    public function updateCompanyProfile($data) {
        $this->db->query('UPDATE tblemployees 
        SET
            internalEmail = LOWER(:internalEmail),
            hire_date = :hire_date,
            modified_at = :modified_at
        WHERE empID = :empID');

        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':internalEmail', $data['internalEmail']);
        $this->db->bind(':hire_date', $data['hire_date']);
        $this->db->bind(':modified_at', $data['modified_at']); 
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }


    // Update employee department table by ID
    public function updateJobByID($data) {
        $this->db->query('UPDATE tbldepartment_employee SET 
        empID = :empID,
        jobID = :jobID,
        deptID = :deptID,
        from_date = :from_date,
        to_date = :to_date,
        modified_on = :modified_on,
        created_by = :created_by
        WHERE id = :id AND empID = :empID ');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':jobID', $data['jobID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        $this->db->bind(':modified_on', $data['modified_on']);
        $this->db->bind(':created_by', $data['created_by']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
    
    // Update Employee Retirement Date on change
    public function updateRetirementbyID($retirementDate, $data) {
        $this->db->query('UPDATE tblemployees SET retirementDate = :retirementDate
        WHERE empID = :empID');

        $this->db->bind(':retirementDate', $retirementDate);
        $this->db->bind(':empID', $data['empID']);
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }


    // Update Supervisor to table
    public function updateSupervisors($data) {
        $this->db->query('UPDATE tbldepartment_supervisor SET
        deptID = :deptID,
        from_date = :from_date, 
        to_date = :to_date 
        WHERE empID = :empID');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }


     // Update Manager to table
     public function updateManager($data) {
        $this->db->query('UPDATE tbldepartment_manager SET
        empID = :empID,
        deptID = :deptID,
        from_date = :from_date, 
        to_date = :to_date 
        WHERE empID = :empID || deptID = :deptID AND from_date <= :from_date');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    
    /****************************************
     *  DELETE QUERIES
    ****************************************/

    // Delete Employee
    public function deleteEmployee($empID) {
        $this->db->query('DELETE FROM tblemployees WHERE empID = :empID');
        $this->db->bind(':empID', $empID);
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } 

    // Delete Employee Job History
    public function deleteJobHistory($id) {
        $this->db->query('DELETE FROM tbldepartment_employee WHERE id = :id');
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } 

    /****************************************
     *  STORED PROCEDURES
    ****************************************/
    
    

    
    

}