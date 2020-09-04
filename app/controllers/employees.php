<?php

class Employees extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->empModel = $this->model('Employee');
        $this->deptModel = $this->model('Department');
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

    /**
     * Add Employee
     */
    public function add() {

        $employees = $this->empModel->getEmployees();
        $departments = $this->deptModel->getDepartments();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
            $data = [
                'title' => 'Add Employees',
                'singlular' => 'Employee',
                'description' => 'Add Employee',
                'empID' => trim($_POST['empNo']),
                'first_name' => trim($_POST['fname']),
                'last_name' => trim($_POST['lname']),
                'relGender' => trim($_POST['gender']),
                'empEmail' => trim($_POST['empEmail']),
                'created_date' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['userID'],
                'departments' => '',
                


                'deptName_err' => '',
                'deptCode_err' => ''
            ];

            if($this->empModel->addEmployee($data)) {
                flashMessage('add_sucess', 'Department added successfully!', 'alert alert-success');
                redirect('employees/add');
            } else {
                flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
            } 
           
        } else {

           
            $data = [
                'title' => 'Add Employees',
                'singlular' => 'Employee',
                'description' => 'Add Employee',
                'departments' => $departments,
                'deptName' =>' ',
                'deptCode' => ' ',
                'deptName_err' => '',
                'deptCode_err' => ''
            ];
            $this->view('employees/add', $data);

        }
    }



   

}


