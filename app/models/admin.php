<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getEmployees() {
        $this->db->query(
            'SELECT idEmployee, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME, emp_no, hire_date, phone, job, tblDepartment.deptName
            FROM tblEmployees 
                LEFT JOIN tblDepartment
            ON tblEmployees.idDepartment_fk = tblDepartment.idDept');

        $results = $this->db->resultsGet();
        return $results;
    }


    public function addDept($data) {
        $this->db->query('INSERT INTO tblDepartment (deptName, deptCode) VALUES(:deptName, :deptCode)'); 
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':deptCode', $data['deptCode']);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
    




    public function getDepartments() {
        $this->db->query('SELECT *,  CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME
        
        FROM tblDepartment, tblEmployees WHERE tblEmployees.supervisor_id IN (SELECT tblEmployees.supervisor_id FROM tblEmployees)');
        $results = $this->db->resultsGet();
        return $results;  

        /*   
        
      SELECT tblDepartment.idDept, tblDepartment.deptName, tblDepartment.deptCode, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME
FROM tblDepartment
        LEFT JOIN tblemployees
        ON  tblDepartment.idDept =  tblemployees.idDepartment_fk


        
        $this->db->query('SELECT *, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS SUPERVISOR FROM tblDepartment
        LEFT JOIN tblEmployees
        ON  tblDepartment.idDept =  tblEmployees.idDepartment_fk');  */
    } 

    public function findDepartmentByName($deptName) {
        $this->db->query('SELECT * FROM tblDepartment WHERE deptName = :deptName'); 
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

        $this->db->query('SELECT * FROM tblDepartment WHERE deptCode = :deptCode'); 
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

    public function addDepartment() {
       // $this->db->query('');

       // $this->db->query('tblDepartment');

       // $results = $this->db->resultsGet();
       // return $results;  
    } 

    
    

}



       /*

      $this->db->query('SELECT idEmployee, emp_no, hire_date, phone, job, tblDepartment.idDept,
        CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
        FROM tblEmployees, tblDepartment 
        WHERE  tblEmployees.idDepartment_fk = tblDepartment.idDept');


'SELECT idEmployee, emp_no, first_name, middle_name, last_name, hire_date, phone, job, idDepartment_fk, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
FROM tblEmployees'

        SELECT idEmployee, emp_no, first_name, middle_name, last_name, hire_date, phone, job, idDepartment_fk,
CONCAT_WS(' ', tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
FROM tblEmployees
INNER JOIN tblDepartment 
ON tblDepartment.idDept 
WHERE tblEmployees.idDepartment_fk = tblDepartment.idDept 

;



        SELECT
        tblDepartment.idDept,
        tblDepartment.department_name,
        tblDepartment.departmentCode,
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS SUPERVISOR,
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS MANAGER
        
        FROM tblDepartment, tblSupervisor,  tblDepartmentManager, tblEmployees
        WHERE
            tblSupervisor.idEmployee_fk = tblEmployees.idEmployee AND 
			tblDepartmentManager.idemployee_fk = tblEmployees.idEmployee
        ORDER by 
            tblDepartment.idDept ASC

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
        $this->db->query('SELECT * FROM tblDepartment 
        INNER JOIN tblSupervisor
        ON tblDepartment.idDept = tblSupervisor.idDept_fk 
        ORDER BY tblDepartment.idDept DESC
        
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
