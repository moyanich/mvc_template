<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDepartments() {
        $this->db->query('SELECT
        tblDepartment.idDept,
        tblDepartment.department_name,
        tblDepartment.departmentCode,
        tblSupervisor.idSupervisor,
        tblSupervisor.idEmployee_fk
        FROM tblDepartment, tblSupervisor
        WHERE 
            tblDepartment.idDept = tblSupervisor.idDept_fk 
        ORDER by 
            tblDepartment.idDept ASC
        ');

        /* 
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


        $results = $this->db->resultsGet();
        return $results;
    } 

    
    

}
