<?php

class Departments extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->deptModel = $this->model('Department');
    }

    public function index() {

        $departments = $this->deptModel->getDepartments();

        $data = [
            'title' => 'Departments List',
            'subtitle' => 'Departments',
            'description' => 'Displays a list of the departments in the company',
            'departments' => $departments
        ];
        $this->view('departments/index', $data);
    }

    public function edit($deptID) {
        $editDept = $this->deptModel->getDeptById($deptID);


        $data = [
            'title' => 'You are editing',
            'description' => 'Displays a list of the departments in the company',
            'id' => $deptID,
            'deptName' => $editDept->deptName
        ];

        $this->view('departments/edit', $data);
    }


    /*
    public function add() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            /*
             * Process Form
            */
 /*
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

       
    } */




    /* END Departments */
    
} 