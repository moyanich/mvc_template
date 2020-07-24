<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getEmployees() {
        $this->db->query(
            'SELECT idEmployee, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME, emp_no, hire_date, phone, job, tblDepartment.department_name
            FROM tblEmployees 
                LEFT JOIN tblDepartment
            ON tblEmployees.idDepartment_fk = tblDepartment.idDept ');

        $results = $this->db->resultsGet();
        return $results;
    }



    public function getDepartments() {
        $this->db->query('SELECT * FROM tblDepartment');

        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function addDepartments() {
        $this->db->query('');

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
