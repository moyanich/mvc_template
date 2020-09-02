<?php

class Admins extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin())  {
            redirect('users/login');
        } 
        $this->adminModel = $this->model('Admin');
        $this->deptModel = $this->model('Department');
    }

    public function index() {
        $countDepts = $this->deptModel->countDepartments();
        $userActivity = $this->adminModel->getUserActivity();

        $data = [
            'title' => 'Welcome',
            'description' => '',
            'departments' => $countDepts,
            'activity' => $userActivity
        ];

        $this->view('admins/index', $data);
    }

    /* BEGIN Employees  */

    public function allemployees() {

        $emp_list = $this->adminModel->getEmployees();

        $data = [
            'title' => 'Employee List',
            'employees' => $emp_list
        ];
        $this->view('admins/allemployees', $data);
    } 


    public function addemployee() {
        $data = [
            'title' => 'add emp',
            'description' => 'HR Management'
        ];
        $this->view('admins/addemployee', $data);
    } 

   
} 