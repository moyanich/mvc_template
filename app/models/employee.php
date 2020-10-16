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
    public function getEmployees() {
        $this->db->query('SELECT * FROM tblEmployees ORDER BY first_name ASC');
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


    /***************************************
     *  SELECT QUERIES WITH CRITIERIA
    ****************************************/

    // Find Employee by ID ORG QUERY
   /* public function getEmployeeByID($empID) {
        $this->db->query('SELECT * FROM tblemployees
        WHERE empID = :empID');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    } */

    public function getEmployeeByID($empID) {
        $this->db->query('SELECT * FROM tblemployees
        LEFT JOIN tbldepartment_employee ON tblemployees.empID = tbldepartment_employee.empID
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        LEFT JOIN tbljobtitles ON tbljobtitles.id = tbldepartment_employee.jobID
        WHERE tblemployees.empID = :empID
        ORDER BY tbldepartment_employee.from_date DESC 
        
        ');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    }

   /* public function getEmployeeByID($empID) {
        $this->db->query('SELECT tblemployees.first_name, tblemployees.last_name FROM tblemployees
        LEFT JOIN tbldepartment_employee ON tblemployees.empID = tbldepartment_employee.empID
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        LEFT JOIN tbljobtitles ON tbljobtitles.id = tbldepartment_employee.jobID
        WHERE tblemployees.empID = :empID
        ORDER BY tbldepartment_employee.from_date DESC 
        
        ');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    } */

    
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

    // Update Employee job History
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
            address = :address,
            city = :city,
            parish = :parish,
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
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':parish', $data['parish']);
        $this->db->bind(':modified_at', $data['modified_at']); 
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
    
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
    


   /* PROCEDURE
   
   public function addSupervisors($data) {
        $this->db->query('CALL GetSupervisors(:empID, :deptID, :from_date, :to_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } */




    
      /*  $this->db->query('SELECT  tbldepartment_employee.jobID, tbldepartment_employee.deptID, tblemployees.empID
        FROM tbldepartment_employee 
        LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        LEFT JOIN tblemployees ON tbldepartment_employee.empID = tblemployees.empID
        WHERE tbldepartment_employee.deptID = :deptID AND tbljobtitles.title = "Supervisor"'); */
        //$this->db->bind(':empID', $empID);
   	
  /*

  SELECT empID, jobID, deptID FROM tbldepartment_employee 
LEFT join tbljobtitles
ON tbldepartment_employee.jobID = tbljobtitles.id
LEFT join tbldepartment
ON tbldepartment_employee.deptID = tbldepartment.id
WHERE tbljobtitles.title = "Supervisor" AND tbldepartment_employee.deptID = "dep6";
*/

  

}



   
  /*  BEGIN
	SELECT title, jobID, deptID, empID, tbldepartment_employee.from_date, tbldepartment_employeeto.to_date from tbljobtitles LEFT JOIN 
tbldepartment_employee ON tbljobtitles.id = tbldepartment_employee.jobID
WHERE title = "Supervisor";


INSERT into tbldepartment_supervisor (empID, deptID, jobID, from_date, to_date) VALUES (empID, deptID, jobID, from_date, to_date);

END


SELECT title, jobID, deptID, empID from tbljobtitles LEFT JOIN 
tbldepartment_employee ON tbljobtitles.id = tbldepartment_employee.jobID
WHERE title = "Supervisor" AND empID = 94

BEGIN
SELECT empID, jobID, deptID, from_date, to_date from  tbldepartment_employee
LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
WHERE tbljobtitle.title = "Supervisor" AND empID = empID;
END

*/

  /*
  SELECT title, jobID, deptID, empID from tbljobtitles LEFT JOIN 
tbldepartment_employee ON tbljobtitles.id = tbldepartment_employee.jobID
WHERE title = "Supervisor"


    */

  

  // Add email 
   /* public function addEmail($data) {
        $this->db->query('CALL insertEmail(UPPER(:empID), :empEmail, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':empEmail', $data['empEmail']);
        $this->db->bind(':created_date', $data['created_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    // Add Department     
    public function addDept($data) {
        $this->db->query('CALL EmployeeDept(UPPER(:empID), :relDeptID, :created_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':relDeptID', $data['relDeptID']);
        $this->db->bind(':created_date', $data['created_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } */

   

    


     /*


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
            relDeptID = :relDeptID,
            internalEmail = LOWER(:internalEmail),
            externalEmail = LOWER(:externalEmail),
            address = :address,
            city = :city,
            parish = :parish,
            hire_date = :hire_date,
            
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
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':internalEmail', $data['internalEmail']);
        $this->db->bind(':externalEmail', $data['externalEmail']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':parish', $data['parish']);
        $this->db->bind(':hire_date', $data['hire_date']);
        $this->db->bind(':relDeptID', $data['relDeptID']);
        $this->db->bind(':modified_at', $data['modified_at']); 
           
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    */



     // Get Employee most recent Job History
    /* public function updatejobHistory($id) {
       $this->db->query('SELECT * 
        FROM tblempjobhistory
        LEFT JOIN tbldepartments ON tblempjobhistory.relDeptID = tbldepartments.id
        WHERE relEmpID = :id 
        ORDER BY tblempjobhistory.created_date DESC');

        //$this->db->query('SELECT *, tbldepartments.id FROM tblempjobhistory, tbldepartments WHERE relEmpID = :id order by tblempjobhistory.created_date DESC LIMIT 1');
        $this->db->bind(':id', $id);
        $row = $this->db->resultsGet();
        return $row; 
    } */




  /*  // Get Employee most recent Job History
    public function getjobHistory($id) {
        $this->db->query('SELECT * 
        FROM tbljobtitles
        LEFT JOIN tbldepartments ON tblempjobhistory.relDeptID = tbldepartments.id
        WHERE relEmpID = :id 
        ORDER BY tblempjobhistory.created_date 
        DESC LIMIT 1');

        //$this->db->query('SELECT *, tbldepartments.id FROM tblempjobhistory, tbldepartments WHERE relEmpID = :id order by tblempjobhistory.created_date DESC LIMIT 1');
        $this->db->bind(':id', $id);
        $row = $this->db->resultsGet();
        return $row;
    }


     // Get Employee most recent Job History
     public function empjobHistory($id) {
        $this->db->query('SELECT * 
        FROM tblempjobhistory
        LEFT JOIN tbldepartments ON tblempjobhistory.relDeptID = tbldepartments.id
        WHERE relEmpID = :id 
        ORDER BY tblempjobhistory.created_date DESC');

        //$this->db->query('SELECT *, tbldepartments.id FROM tblempjobhistory, tbldepartments WHERE relEmpID = :id order by tblempjobhistory.created_date DESC LIMIT 1');
        $this->db->bind(':id', $id);
        $row = $this->db->resultsGet();
        return $row;
    } */




 /* public function getEmpCompInfoByID($id) {
        $this->db->query('SELECT tblempjobhistory.id, tblempjobhistory.job, tblempjobhistory.relEmpID, tbldepartments.id, tbldepartments.deptName FROM 
        tbldepartments, tblempjobhistory
        WHERE relEmpID = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->singleResult();
        return $results;
    }

    public function updateEmpCompInfo($data) {
        $this->db->query('UPDATE tblempjobhistory 
                SET
                job = :job,
                relDeptID = :relDeptID
            WHERE relEmpID = :id
        ');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':relDeptID', $data['relDeptID']);

        
      //  $this->db->bind(':empID', $data['empID']);
       // $this->db->bind(':modified_at', $data['modified_at']); 
            
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 
 */









/*

public function getEmpDepartment($empID) {
        $this->db->query('SELECT empID, depID, tbldepartment.name 
        FROM tbldepartment_employee
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        WHERE tbldepartment_employee.empID = :empID 
        ORDER BY from_date DESC 
        LIMIT 1');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    }

    public function getEmpJobTitle($empID) {
        $this->db->query('SELECT empID, tbljobtitles.title, tbldepartment_employee.jobID, tbldepartment_employee.deptID FROM tbldepartment_employee 
        LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
        WHERE tbldepartment_employee.empID = :empID 
        ORDER BY tbldepartment_employee.from_date DESC 
        LIMIT 1');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    }


    */


    


   

       /* $this->db->query('SELECT *
        FROM tblEmployees, tblempjobhistory
        WHERE tblempjobhistory.relEmpID = tblEmployees.id');

        //SELECT * FROM tblEmployees, tblempjobhistory WHERE tblempjobhistory.relEmpID = tblEmployees.id 


        SELECT *, tblempjobhistory.job, tblempjobhistory.id

        SELECT *
        FROM tblEmployees 
        LEFT JOIN tblempjobhistory ON tblempjobhistory.relEmpID = tblEmployees.empID


        SELECT employee.first_name, employee.last_name, call.start_time, call.end_time, call_outcome.outcome_text
        FROM employee
        INNER JOIN call ON call.employee_id = employee.id
        INNER JOIN call_outcome ON call.call_outcome_id = call_outcome.id
        ORDER BY call.start_time ASC; */


        /*

        $this->db->query('SELECT *, tbldepartments.deptName AS department FROM tblempjobhistory
        INNER JOIN tbldepartments
        ON tblempjobhistory.relDeptID = tbldepartments.ID
        WHERE relEmpID = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->singleResult();
        return $results;

        */
   
   
    
    

   


         /*  $this->db->query('SELECT *, tbljobtitles.empID, tbldepartment.id, tbldepartments.deptName FROM tblemployees
        LEFT JOIN tbljobtitles ON tblemployees.id = tbljobtitles.empID
        LEFT JOIN tbldepartment ON tblemployees.relDeptID = tbldepartment.id
        WHERE tblemployees.id = :id'); */
   

    


 /*  $this->db->query('SELECT *, tbldepartments.deptName AS department FROM tblempjobhistory
        INNER JOIN tbldepartments
        ON tblempjobhistory.relDeptID = tbldepartments.ID
        WHERE relEmpID = :id'); */

   /* 
   
   
   
    public function updateEmpCompProfile($data) {
        $this->db->query('UPDATE tblemployees 
        SET
            hire_date = :hire_date,
            internalEmail = :internalEmail,
            modified_at = :modified_at
        WHERE id = :id AND empID = :empID');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':hire_date', $data['hire_date']);
        $this->db->bind(':internalEmail', $data['internalEmail']);
        $this->db->bind(':modified_at', $data['modified_at']); 
           
        if($this->db->execute()) {
            return true;
        } 
        return false;

        //UPDATE `tblemployees` SET `hire_date` = '2002-06-07' WHERE `tblemployees`.`id` = 94 AND `tblemployees`.`empID` = 'EUM'
    } 
   
   

   
   
   
   public function setNewRetirement($data) {
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



  
    




/*


    SELECT * FROM tblempdepartment 
    INNER JOIN tbldepartments
    ON tblempdepartment.relDeptID = tbldepartments.ID
    WHERE relEmpID = "ESTEX"



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

























     /*
     // Add Supervisor to table
    public function updateSupervisors($data) {
        $this->db->query('UPDATE tbldepartment_supervisor SET
        empID = :empID, 
        deptID = :deptID, 
        from_date = :from_date, 
        to_date = :to_date WHERE  empID = :empID AND  deptID = :deptID');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    */

    