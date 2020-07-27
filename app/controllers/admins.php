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
    
    public function departments() {

        $departments = $this->adminModel->getDepartments();

        $data = [
            'title' => 'Departments List',
            'subtitle' => 'Departments',
            'description' => 'Displays a list of the departments in the company',
            'departments' => $departments
        ];
        $this->view('admins/departments', $data);
    }

    public function add_dept() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            /*
             * Process Form
            */

            //  Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'deptName' => trim($_POST['deptName']),
                'deptID' => trim($_POST['deptID']),
                'deptName_err' => '',
                'deptID_err' => ''
            ];

            //  Validate Department Name
            if(empty($data['deptName'])) {
                $data['deptName_err'] = 'Please enter a Department Name';
            } else {
                /// check if email exists
                if($this->adminModel->findDepartmentByName($data['deptName'])){
                    $data['deptName_err'] = 'Department already exists!';
                } 
            }

            if(empty($data['deptID'])) {
                $data['deptID_err'] = 'Please enter a new Department Code';
            } else {
                /// check if dept name exists
               if($this->adminModel->findDepartmentByID($data['deptID'])){
                    $data['deptID_err'] = 'Department Code already exists!';
                } 
            } 

            // Make sure errors are empty
            if( empty($data['deptName_err']) && empty($data['deptID_err']) ) {
                // Validated

                // Add Department
                if($this->adminModel->addDept($data)) {
                    flashMessage('add_sucess', 'Department added successfully!', 'alert alert-success');
                    redirect('admins/departments');
                } else {
                    
                    die('Something went wrong');
                } 
            }
            else {
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('admins/add_dept', $data);
            }

        } else {
           
            $data = [
                'deptName' =>' ',
                'deptID' => ' ',
                'deptName_err' => '',
                'deptID_err' => ''
            ];
            $this->view('admins/add_dept', $data);
        }

       
    }



    
} 