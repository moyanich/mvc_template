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

    public function checkforChanges($deptCode, $deptName) {
        $this->db->query('SELECT deptCode, deptName FROM tblDepartments WHERE deptCode = :deptCode AND deptName = :deptName'); 
        $this->db->bind(':deptCode', $deptCode);
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


/*
    public function addDept($data) {
        $this->db->query('INSERT INTO tblDepartment (deptCode, deptName) VALUES(:deptName, :deptCode)'); 
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':deptCode', $data['deptCode']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }   
 */
   




}



/* deptCode = (CASE 
                            WHEN :deptCode IS NULL THEN deptCode
                            WHEN :deptCode IS NOT NULL THEN deptCode
                            ELSE :deptCode
                        END), */
       /* 
       
       dont try to assign the value to your column inside the CASE WHEN statements since you are already doing that.
the CASE WHEN will evaluate to the value that satisfies the condition.
try this code

UPDATE payments SET 
 total = :total,
 paid = (CASE WHEN paid > :new THEN :new ELSE paid END),
 due = (CASE WHEN paid < :new THEN (:new - paid) ELSE due END)
 WHERE id = :id 
I removed the assignments to paid and due columns inside the case statement.


$sql = "UPDATE employee SET 
			empID = 
				CASE 
					WHEN '$EmpID' IS NULL THEN empID
					WHEN '$EmpID' IS NOT NULL THEN '$EmpID'
			        ELSE empID 
			    END,

			
			  empStatus =
				CASE
			        WHEN '$newStatus' IS NULL THEN NULL
			        WHEN '$newStatus' IS NOT NULL THEN '$newStatus'
			        ELSE empStatus
				END
			
			
			WHERE employee.empID = '$id' "; */