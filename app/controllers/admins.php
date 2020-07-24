<?php

class Admins extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->adminModel = $this->model('Admin');
    }

    public function index() {
        $data = [
            'title' => 'Welcome',
            'description' => '',
        ];
        $this->view('admins/index', $data);
    }

    public function dashboard() {
        $data = [
            'title' => 'Dashboard',
            'description' => ''
        ];
        $this->view('admins/dashboard', $data);
    }

    public function allemployees() {

        $emp_list = $this->adminModel->getEmployees();

        $data = [
            'title' => 'All Employees',
            'description' => 'HR Management',
            'employees' => $emp_list
        ];
        $this->view('admins/allemployees', $data);
    } 



    
    public function departments() {

       $departments = $this->adminModel->getDepartments();

        $data = [
            'title' => 'Departments List',
            'description' => '',
            'departments' => $departments
        ];
        $this->view('admins/departments', $data);
    }


    public function addemployee() {
        $data = [
            'title' => 'add emp',
            'description' => 'HR Management'
        ];
        $this->view('admins/addemployee', $data);
    } 

    
} 