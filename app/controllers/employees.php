<?php

class Employees extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->empModel = $this->model('Employee');
    }

    /*
    * Displays Index
    */
    public function index() {
        $employees = $this->empModel->getEmployees();
        $data = [
            'title' => 'Employees',
            'singlular' => 'Employee',
            'description' => 'Displays a list of the Employees in the company',
            'employees' => $employees
        ];
        $this->view('employees/index', $data);
    }

    public function add() {
        $employees = $this->empModel->getEmployees();
        $data = [
            'title' => 'Employees',
            'singlular' => 'Employee',
            'description' => 'Add Employee'
           
        ];
        $this->view('employees/add', $data);
    }

   

}


