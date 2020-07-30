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

    public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /*
             * Process Form
            */

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // GET data from Form
            $data = [
                'id' => $id,
                'deptID' => trim($_POST['deptID']),
                'deptName' => trim($_POST['deptName']),
                'modified_on' => date("Y-m-d H:i:s"),
                'deptID_err' => '',
                'deptName_err' => ''
            ]; 

            if(empty($data['deptID'])) {
                $data['deptID_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            }
            else {
                // check if Department ID exists
                if($this->deptModel->findDepartmentByCode($data['deptID'])) {
                   $data['deptID_err'] = 'Department ID already exists';
                   $this->view('departments/edit', $data);                   
                } 
            }
            
            

            // Make sure errors are empty
            if( empty($data['deptID_err']) ) {

                // Register User
                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                }

            }

            // Validate Dept ID
           /* if(empty($data['deptID'])) {
                $data['deptID_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            } 
            else {
                // check if Department ID exists
                if($this->deptModel->findDepartmentByCode($data['deptID'])) {
                   $data['deptID_err'] = 'Department ID already exists';
                   $this->view('departments/edit', $data);                   
                } 
            }


            if(empty($data['deptName'])) {
                $data['deptName_err'] = 'Please enter a Department Name';
                $this->view('departments/edit', $data);
            } 
            else {
                /// check if Department Name exists
                if($this->deptModel->findDepartmentByName($data['deptName'])) {
                   $data['deptName_err'] = 'Department Name already exists';
                   $this->view('departments/edit', $data);                   
                } 
            } 


           /* if(!empty($data['deptName']) && $data['deptName'] = $data['deptName']) {
                
            } */
           





        } else {

            // Get existing Department Information from model
            $editDept = $this->deptModel->getDeptById($id);
            $data = [
                'id' => $id,
                'deptID' => $editDept->deptID,
                'deptName' => $editDept->deptName,
                'deptID_err' => '',
                'deptName_err' => ''
            ];
    
            $this->view('departments/edit', $data);
        }


       
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