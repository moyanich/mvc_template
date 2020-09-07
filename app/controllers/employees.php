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
        $gender = $this->empModel->genders();
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
            $data = [
                'title' => 'Employee Registration',
                'singular' => 'Employee Details',
                'description' => 'Add Employee',
                'empID' => trim($_POST['empNo']),
                'first_name' => trim($_POST['fname']),
                'last_name' => trim($_POST['lname']),
                'relGender' => trim($_POST['gender']),
                'empEmail' => trim($_POST['empEmail']),
                'created_date' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['userID'],
                'departments' => '',
                'empID_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'deptCode_err' => '',
                'empID_err' => '',
                'deptCode_err' => ''
            ];

            //  Validate Username
            if(empty($data['empID'])) {
                $data['empID_err'] = 'Please enter a username';
            } else {
                /// check if username exists
                if($this->userModel->findUserByUsername($data['username'])){
                    $data['username_err'] = 'User already exists! Please try another username or <a href="login">login into your account</a>';
                }
            }













            if($this->empModel->addEmployee($data)) {
                $this->empModel->addEmail($data);
                
               

                flashMessage('add_sucess', 'Department added successfully!', 'alert alert-success');
                redirect('employees/add');
            } else {
                flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
            } 
           
        } else {

           
            $data = [
                'title' => 'Employee Registration',
                'singular' => 'Employee Details',
                'description' => 'Add Employee',
                'departments' => $departments,
                'relGender' => $gender,
                'deptName' =>' ',
                'deptCode' => ' ',
                'deptName_err' => '',
                'deptCode_err' => ''
            ];
            $this->view('employees/add', $data);

        }
    }



   

}


