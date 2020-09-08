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
        $employees = $this->empModel->allEmployees();
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
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $genders = $this->empModel->genders();
            $departments = $this->deptModel->getDepartments();
            
            $data = [
                'title'             => 'Employee Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'genders'           => $genders,
                'departments'       => $departments,
                'empID'             => trim($_POST['empID']),
                'empTitle'          => trim($_POST['empTitle']),
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'empDOB'            => trim($_POST['empDOB']),
                'relGender'         => trim($_POST['relGender']),
                'empEmail'          => trim($_POST['empEmail']),

                'relDeptID'         => trim($_POST['relDeptID']),


                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'relGender_err'      => '',
                'empEmail_err'      => '',
                'relDeptID_err'     => '',
                
                'created_date' => date("Y-m-d H:i:s"),



                'created_by' => $_SESSION['userID']
                
                
            ];


            // Validate empID
            if(empty($data['empID'])) :
                $data['empID_err'] = 'Please enter an employee ID';
            elseif (strlen($data['empID']) > 6) :
                $data['empID_err'] = 'Employee ID should be 6 characters or less';
            else :
                if($this->empModel->findEmpByID($data['empID'])) :
                    $data['empID_err'] = 'Employee ID already exists';
                endif;
            endif;

            // Validate First Name
            if(empty($data['first_name'])) :
                $data['first_name_err'] = 'Please enter a First Name';
            endif;

            // Validate Last Name
            if(empty($data['last_name'])) :
                $data['last_name_err'] = 'Please enter a Last Name';
            endif;

            // Validate empDOB
            if(empty($data['empDOB'])) :
                $data['empDOB_err'] = 'Please enter Date';
            elseif (!isRealDate($data['empDOB'])) :
                $data['empDOB_err'] = 'Invalid Date';
            endif;

            // Filter Email
            if (filter_var($data['empEmail'], FILTER_VALIDATE_EMAIL)) :
                $data['empEmail_err'] = 'Invalid Email Address';
            endif;

            // Validate Gender
            if (!isset($data['relGender']) ) :
                $data['relGender_err'] = 'Please select a Gender';
            endif;

            // Validate Department
            if ($data['relDeptID'] < 1 ) :
                $data['relDeptID_err'] = 'Please select a Department';
            endif;



         

            // Make sure errors are empty
            
            if( empty($data['empID_err']) && empty($data['first_name_err']) 
                && empty($data['last_name_err']) && empty($data['empDOB_err']) 
                && empty($data['relGender_err']) && empty($data['relDeptID_err'])   ) :

                // Validated, then Add Employee
                if($this->empModel->addEmployee($data)) :
                    $this->empModel->addEmail($data);
                    $this->empModel->addDept($data);

                    flashMessage('add_sucess', 'Employee added successfully!', 'alert alert-success');
                    redirect('employees/add');
                else :
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                endif;
            else :
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/add', $data);
            endif;

        } 
        else {

            $employees = $this->empModel->getEmployees();
            $departments = $this->deptModel->getDepartments();
            $genders = $this->empModel->genders();
           
            $data = [
                'title'             => 'Employee Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'genders'           => $genders,
                'departments'       => $departments,
                'empID'             => '',
                'empTitle'          => '',
                'first_name'        => '',
                'middle_name'       => '',
                'last_name'         => '',
                'empDOB'            => '',
                'relGender'         => '',
                'empEmail'          => '',
                
                'relDeptID'         => '',
                
                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'relGender_err' => '',
                'empEmail_err'      => '',
                'relDeptID_err'     => ''

                
                
            ];

            $this->view('employees/add', $data);

        }
    }


 
   

}




   /*  
            
            // Validate Title
            if (strlen($data['empTitle']) > 5) :
                $data['empTitle_err'] = 'Title should 5 characters or less';
            endif;
            
            // Validate Email
              if(empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                /// check if email exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email already exists! Please try another email or <a href="login">login into your account</a>';
                }
            }
*/

