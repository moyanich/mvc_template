<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /* BEGIN Employees  */
    public function getEmployees() {
        $this->db->query(
            'SELECT idEmployee, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME, emp_no, hire_date, phone, job, tbldepartments.deptName
            FROM tblEmployees 
                LEFT JOIN tbldepartments
            ON tblEmployees.idDepartment_fk = tbldepartments.idDept');

        $results = $this->db->resultsGet();
        return $results;
    }



    /* END Employees */

    /* BEGIN Departments */

    public function addDept($data) {
        $this->db->query('INSERT INTO tbldepartments (deptName, deptCode) VALUES(:deptName, :deptCode)'); 
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':deptCode', $data['deptCode']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }   

    public function getDepartments() {
        $this->db->query('SELECT idDept, deptCode, deptName, deptSupervisor, emp_no, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME FROM tbldepartments LEFT JOIN tblemployees ON tbldepartments.deptSupervisor = tblemployees.emp_no');
        
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function findDepartmentByName($deptName) {
        $this->db->query('SELECT * FROM tbldepartments WHERE deptName = :deptName'); 
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
        $this->db->query('SELECT * FROM tbldepartments WHERE deptCode = :deptCode'); 
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

    /* END Departments */



}




/*

SELECT * FROM empmanagedb.tblDeptSupervisor
RIGHT JOIN tbldepartments
ON tblDeptSupervisor.dep_no = tbldepartments.iddept;

*/


  /* $this->db->query('INSERT INTO tbldepartments (deptName, deptCode) VALUES(:deptName, :deptCode)'); 
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':deptCode', $data['deptCode']);   */

 /* $this->db->query('SELECT idDept, deptName, deptSupervisor, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME
        FROM tbldepartments, tblEmployees 
        
        '); */

 /*   
        
      SELECT tbldepartments.idDept, tbldepartments.deptName, tbldepartments.deptCode, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME
FROM tbldepartments
        LEFT JOIN tblemployees
        ON  tbldepartments.idDept =  tblemployees.idDepartment_fk


        
        $this->db->query('SELECT *, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS SUPERVISOR FROM tbldepartments
        LEFT JOIN tblEmployees
        ON  tbldepartments.idDept =  tblEmployees.idDepartment_fk');  */




 /*

    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username'); // Taking in a named parameter :email
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    
    public function findDepartmentByCode($$deptcode) {

        $this->db->query('SELECT * FROM users WHERE username = :username'); // Taking in a named parameter :email
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    } */




       /*

      $this->db->query('SELECT idEmployee, emp_no, hire_date, phone, job, tbldepartments.idDept,
        CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
        FROM tblEmployees, tbldepartments 
        WHERE  tblEmployees.idDepartment_fk = tbldepartments.idDept');


'SELECT idEmployee, emp_no, first_name, middle_name, last_name, hire_date, phone, job, idDepartment_fk, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
FROM tblEmployees'

        SELECT idEmployee, emp_no, first_name, middle_name, last_name, hire_date, phone, job, idDepartment_fk,
CONCAT_WS(' ', tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
FROM tblEmployees
INNER JOIN tbldepartments 
ON tbldepartments.idDept 
WHERE tblEmployees.idDepartment_fk = tbldepartments.idDept 

;



        SELECT
        tbldepartments.idDept,
        tbldepartments.department_name,
        tbldepartments.departmentCode,
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS SUPERVISOR,
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS MANAGER
        
        FROM tbldepartments, tblSupervisor,  tbldepartmentsManager, tblEmployees
        WHERE
            tblSupervisor.idEmployee_fk = tblEmployees.idEmployee AND 
			tbldepartmentsManager.idemployee_fk = tblEmployees.idEmployee
        ORDER by 
            tbldepartments.idDept ASC

        SELECT customerName, customercity, customermail, salestotal
FROM onlinecustomers AS oc
   INNER JOIN
   orders AS o
   ON oc.customerid = o.customerid
   INNER JOIN
   sales AS s
   ON o.orderId = s.orderId



   
(SELECT supervisor_id
            FROM tblEmployees)
        $this->db->query('SELECT * FROM tbldepartments 
        INNER JOIN tblSupervisor
        ON tbldepartments.idDept = tblSupervisor.idDept_fk 
        ORDER BY tbldepartments.idDept DESC
        
        ')

        posts.id as postId,
        users.id as userId,
        posts.created_at as postCreated,
        users.created_at as userCreated
        FROM posts
        INNER JOIN users
        ON posts.user_id = users.id
        ORDER BY posts.created_at DESC
        
        */
