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


    public function getDepartmentSupervisorandMaanger() {
        $this->db->query('SELECT tbldepartment.id, tbldepartment.name, tbldepartment_supervisor.empID as sup, tbldepartment_manager.empID as mgmt, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname FROM tblemployees WHERE empID = tbldepartment_supervisor.empID ) AS supervisor, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname2 FROM tblemployees WHERE empID = tbldepartment_manager.empID ) AS manager
        FROM tbldepartment
        LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
        LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id
        ');
        $results = $this->db->resultsGet();
        return $results;  
     } 



     /* 
    public function getDepartmentSupervisorandMaanger() {
        $this->db->query('SELECT tbldepartment.id, tbldepartment.name, tbldepartment_supervisor.empID as sup, tbldepartment_manager.empID as mgmt, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname FROM tblemployees WHERE empID = tbldepartment_supervisor.empID ) AS supervisor, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname2 FROM tblemployees WHERE empID = tbldepartment_manager.empID ) AS manager
        FROM tbldepartment
        LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
        LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id
        ');
        $results = $this->db->resultsGet();
        return $results;  
    } 
    
    */



     /*


     SELECT tbldepartment.id, tbldepartment.name, tbldepartment_supervisor.empID as sup, tbldepartment_manager.empID as mgmt, (SELECT 
           first_name FROM tblemployees WHERE empID = tbldepartment_supervisor.empID ) AS diff
        FROM tbldepartment
LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id



 SELECT tbldepartment.id, tbldepartment.name, tbldepartment_manager.empID, tblEmployees.first_name, tblEmployees.last_name
        FROM tbldepartment
        LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
        LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id
        JOIN tblemployees ON tblemployees.empID = tbldepartment_supervisor.empID OR tblemployees.empID = tbldepartment_manager.empID



      tbldepartment.*, tbldepartment_manager.*, tbldepartment_supervisor.*, tblemployees.empID, CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname
        FROM tbldepartment 
            LEFT JOIN `tbldepartment_manager` ON `tbldepartment_manager`.`deptID` = `tbldepartment`.`id` 
            LEFT JOIN `tbldepartment_supervisor` ON `tbldepartment_supervisor`.`deptID` = `tbldepartment`.`id` 
            LEFT JOIN `tblemployees` ON `tbldepartment_manager`.`empID` = `tblemployees`.`empID`;

     SELECT `tbldepartment`.*, `tbldepartment_manager`.*, `tbldepartment_supervisor`.*, `tblemployees`.*
FROM `tbldepartment` 
	LEFT JOIN `tbldepartment_manager` ON `tbldepartment_manager`.`deptID` = `tbldepartment`.`id` 
	LEFT JOIN `tbldepartment_supervisor` ON `tbldepartment_supervisor`.`deptID` = `tbldepartment`.`id` 
	LEFT JOIN `tblemployees` ON `tbldepartment_manager`.`empID` = `tblemployees`.`empID`; */
   

    /* $this->db->query('SELECT  tbldepartment_employee.jobID, tbldepartment_employee.deptID, tblemployees.empID
     FROM tbldepartment_employee 
     LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
     LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
     LEFT JOIN tblemployees ON tbldepartment_employee.empID = tblemployees.empID
     WHERE tbldepartment_employee.deptID = :deptID AND tbljobtitles.title = "Supervisor"'); */
     //$this->db->bind(':empID', $empID); */



    

    

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

    public function showSupervisor($id) {
        $this->db->query('SELECT tbldepartment_supervisor.empID, CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname
        FROM tbldepartment_supervisor 
        LEFT JOIN tblemployees ON tbldepartment_supervisor.empID = tblemployees.empID
        WHERE deptID = :deptID ');
        $this->db->bind(':deptID', $id);
        $row = $this->db->singleResult();
        return $row;
    }

    public function showManager($id) {
        $this->db->query('SELECT tbldepartment_manager.empID, CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS manager
        FROM tbldepartment_manager
        LEFT JOIN tblemployees ON tbldepartment_manager.empID = tblemployees.empID
        WHERE deptID = :deptID');
        $this->db->bind(':deptID', $id);
        $row = $this->db->singleResult();
        return $row;
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


   /* public function traxs($data) {

        try{
 
            //We start our transaction.
            $this->db->beginTransaction();
         
         
            //Query 1: Attempt to insert the payment record into our database.
            $sql = "INSERT INTO payments (user_id, amount) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $userId, 
                    $paymentAmount,
                )
            );
            
            //Query 2: Attempt to update the user's profile.
            $sup = $this->db->query('UPDATE tbldepartment_supervisor SET empID = :empID WHERE deptID = :id ');

            $sql = "UPDATE users SET credit = credit + ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $paymentAmount, 
                    $userId
                )
            );
            
            //We've got this far without an exception, so commit the changes.
            $pdo->commit();
            
        } 
        //Our catch block will handle any exceptions that are thrown.
        catch(Exception $e){
            //An exception has occured, which means that one of our database queries
            //failed.
            //Print out the error message.
            echo $e->getMessage();
            //Rollback the transaction.
            $pdo->rollBack();
        }


        


        $sql  = 'INSERT INTO members SET
        first_name = :firstName,
        last_name = :lastName,
        user_name = :userName' ;

        $s = $pdo->prepare($sql);
        $s->bindValue(':firstName', $firstName);
        $s->bindValue(':lastName', $lastName);
        $s->bindValue(':userName', $userName);
        $s->execute();


        

        // Bind values
        $this->db->bind(':empID', $data['supID']);
        $this->db->bind(':deptID', $data['id']);
        $s$this->db->execute();
        $pdo->commit();
    } */
   
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

    public function addSupervisor($data) {
        $this->db->query('CALL update_tbl_DEPARTMENT_SUPERVISOR(:empID, :deptID)');
        $this->db->bind(':empID', $data['supervisor']);
        $this->db->bind(':deptID', $data['id']);
        $this->db->execute();
    } 

    public function addManager($data) {
        $this->db->query('CALL update_tbl_DEPARTMENT_MANAGER(:empID, :deptID)');
        $this->db->bind(':empID', $data['manager']);
        $this->db->bind(':deptID', $data['id']);
        $this->db->execute();
    } 

   /* public function updateSupervisor($data) {
        $this->db->query('CALL update_SUPERVISOR(:empID, :deptID)');
        $this->db->bind(':empID', $data['supID']);
        $this->db->bind(':deptID', $data['id']);
        $this->db->execute();
    } */

    

    public function updateManager($data) {
        $this->db->query('CALL update_MANAGER(:empID, :deptID)');
        $this->db->bind(':empID', $data['mgmtID']);
        $this->db->bind(':deptID', $data['id']);
        $this->db->execute();
    } 


    




    
}










/*
 try{
 
            //We start our transaction.
            $dsn->beginTransaction();
         
         
            //Query 1: Attempt to insert the payment record into our database.
            $sql = "INSERT INTO payments (user_id, amount) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $userId, 
                    $paymentAmount,
                )
            );
            
            //Query 2: Attempt to update the user's profile.
            $sql = "UPDATE users SET credit = credit + ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $paymentAmount, 
                    $userId
                )
            );
            
            //We've got this far without an exception, so commit the changes.
            $pdo->commit();
            
        } 
        //Our catch block will handle any exceptions that are thrown.
        catch(Exception $e){
            //An exception has occured, which means that one of our database queries
            //failed.
            //Print out the error message.
            echo $e->getMessage();
            //Rollback the transaction.
            $pdo->rollBack();
        }

        */








    


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