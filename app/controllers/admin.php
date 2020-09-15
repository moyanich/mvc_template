<?php

class Admin extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin())  {
            redirect('users/login');
        } 
        
        $this->adminModel = $this->model('Admins');
        $this->deptModel = $this->model('Department');
        $this->activityModel = $this->model('Activitylogs');
        $this->empModel = $this->model('Employee');
        $this->retirementModel = $this->model('Retirement');
    }

    public function index() {
        $countDepts = $this->deptModel->countDepartments();
        $userActivity = $this->activityModel->getUserActivity();
        $countEmp = $this->empModel->countEmployees();
        $retirementAlert = $this->retirementModel->getUpcomingRetirements();

        $data = [
            'title'         => 'Welcome',
            'description'   => '',
            'departments'   => $countDepts,
            'employees'     => $countEmp,
            'activity'      => $userActivity,
            'retirements'   => $retirementAlert
        ];

        $this->view('admin/index', $data);
    }

    public function company() {
        $comp = $this->adminModel->getCompany();
        $parish = $this->adminModel->getParishes();
        $retireMale = $this->retirementModel->getMaleRetirement();
        $retireFemale =  $this->retirementModel->getFemaleRetirement();

        $data = [
            'title'             => 'Company Settings',
            'compUrl'           => $comp->compUrl,
            'compName'          => $comp->compName,
            'compTRN'           => $comp->compTRN,
            'compNIS'           => $comp->compNIS,
            'contactPerson'     => $comp->contactPerson,
            'address'           => $comp->address,
            'parish'            => $comp->parish,
            'parishName'        => $parish,
            'city'              => $comp->city,
            'email'             => $comp->email,
            'main_phone'        => $comp->main_phone,
            'secondary_phone'   => $comp->secondary_phone,
            'male_retirement'   => $retireMale->years,
            'female_retirement' => $retireFemale->years
        ];

        $this->view('admin/company', $data);
    }

    public function validatecompName() {
        if(isset($_POST['compName'])) {   
            if(empty($_POST['compName'])) {
               echo 'Field cannot be empty!';
            }
        } 
    }

    public function validateTRN() {
        if(isset($_POST['compTRN']) ) {  
            $trn = $_POST['compTRN'];
            if(strlen($trn) > 9 ) {
               echo 'TRN is too long!';
            }
        } 
    }

    public function validateNIS() {
        if(isset($_POST['compNIS'])) {  
            $nis = $_POST['compNIS'];
            if(strlen($nis) > 9) {
               echo 'NIS is too long!';
            }
        } 
    }

    public function validateRetirement() {
        if(isset($_POST['male_retirement']) ) {  
            $male_retirement = $_POST['male_retirement'];
            if(is_numeric($male_retirement) < 1) {
               echo 'Please enter a number greater than 1';
            }
            else if($male_retirement < 0) {
                echo 'Please enter a positive number';
             }
            else if (empty($male_retirement)) {
                echo 'Field cannot be empty';
            }
        } 
    }

    public function validateFemaleRetirement() {
        if(isset($_POST['female_retirement']) ) {  
            $female_retirement = $_POST['female_retirement'];
            if(is_numeric($female_retirement) < 1) {
               echo 'Please enter a number greater than 1';
            }
            else if($female_retirement < 0) {
                echo 'Please enter a positive number';
             }
            else if (empty($female_retirement)) {
                echo 'Field cannot be empty';
            }
        } 
    }

    public function editCompany() {
       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'             => 'Company Settings',
                'compUrl'           => trim($_POST['compUrl']),
                'compName'          => trim($_POST['compName']),
                'contactPerson'     => trim($_POST['contactPerson']),
                'compTRN'           => trim($_POST['compTRN']),
                'compNIS'           => trim($_POST['compNIS']),
                'address'           => trim($_POST['address']),
                'city'              => trim($_POST['city']),
                'parish'            => trim($_POST['parish']),
                'email'             => trim($_POST['email']),
                'main_phone'        => trim($_POST['main_phone']),
                'secondary_phone'   => trim($_POST['secondary_phone']),
                'modified_date'     => date("Y-m-d H:i:s")
            ];

            // Validate deptCode
            if(empty($data['compName'])) {
                flashMessage('save_error', 'Field Cannot be empty!', 'alert alert-warning');
                $this->view('admin/company', $data);
            }

            if( empty($data['compName_err'])  ) {
                if($this->adminModel->updateCompany($data)) {
                    flashMessage('add_success', 'Company Information updated successfully!', 'alert alert-success');
                    redirect('admin/company');
                } else {
                    flashMessage('save_error', 'Field Cannot be empty!', 'alert alert-warning');
                } 
            }
        }
        else {

            // Get existing Company Information from model
            $comp = $this->adminModel->getCompany();
            $parish = $this->adminModel->getParishes();

            $data = [
                'title'             => 'Company Settings',
                'description'       => '',
                'compUrl'           => $comp->compUrl,
                'compName'          => $comp->compName,
                'contactPerson'     => $comp->contactPerson,
                'compNIS'           => $comp->compNIS,
                'compTRN'           => $comp->compTRN,
                'address'           => $comp->address,
                'city'              => $comp->city,
                'parishName'        => $parish,
                'email'             => $comp->email,
                'main_phone'        => $comp->main_phone,
                'secondary_phone'   => $comp->secondary_phone
            ];

            $this->view('admin/company', $data);
        }
    }

    public function editMaleRetirement() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'male_retirement'  => trim($_POST['male_retirement'])
            ];

            if(!empty($data['male_retirement'])  ) {
                if($this->retirementModel->setMaleRetirementYears($data)) {
                    // Call procedure to update all retirement calculations for males
                    $this->retirementModel->runProcedureMaleRetirement($data);
                    
                    flashMessage('add_success', 'Male Retirement Years Updated Successfully!', 'alert alert-success');
                    redirect('admin/company');

                } else {
                    flashMessage('save_error', 'Field Cannot be empty!', 'alert alert-warning');
                } 
            }
        }
        else {
            $retireMale = $this->retirementModel->getMaleRetirement();

            $data = [
                'male_retirement'   => $retireMale->years
            ];

            $this->view('admin/company', $data);
        }
    }

    public function editFemaleRetirement() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'female_retirement'  => trim($_POST['female_retirement'])
            ];

            if(!empty($data['female_retirement'])  ) {
                if($this->retirementModel->setFemaleRetirementYears($data)) {
                    // Call procedure to update all retirement calculations for Females
                    $this->retirementModel->runFemaleRetirement($data);
                    
                    flashMessage('add_success', 'Female Retirement Years Updated Successfully!', 'alert alert-success');
                    redirect('admin/company');

                } else {
                    flashMessage('save_error', 'Field Cannot be empty!', 'alert alert-warning');
                } 
            }
        }
        else {
            $retireFemale = $this->retirementModel->getFemaleRetirement();

            $data = [
                'female_retirement'   => $retireFemale->years
            ];

            $this->view('admin/company', $data);
        }
    }



    





    




}








    /* BEGIN Employees  */

   /* 

   
    public 'id' => string '' (length=0)
    public 'compName' => string 'Mayer and Barry Trading' (length=23)
    public 'siteurl' => string 'Error iusto deserunt' (length=20)
    public 'address' => string '55 Rosu Road' (length=12)
    public 'contactPerson' => string '' (length=0)
   
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
    } */



/*


  public function add() {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $departments = $this->deptModel->getDepartments();
            
            $data = [
                'title'             => 'New Employee Pre-Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => trim($_POST['empNo']),
                'empTitle'          => trim($_POST['empTitle']),
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'empDOB'            => trim($_POST['empDOB']),
                'gender'            => trim($_POST['gender']),
                'empEmail'          => trim($_POST['empEmail']),
                'hire_date'         => trim($_POST['hiredOn']),
                'created_date'      => date("Y-m-d H:i:s"),
                'created_by'        => $_SESSION['userID'],
                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'        => '',
                'empEmail_err'      => '',
                'hiredOn_err'       => '',
                'created_by'        => $_SESSION['userID']
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

            // Validate Hired Date
            if(empty($data['hire_date'])) :
                $data['hiredOn_err'] = 'Please enter Date';
            elseif (!isRealDate($data['hire_date'])) :
                $data['hiredOn_err'] = 'Invalid Date';
            endif;

            // Filter Email
            if (filter_var($data['empEmail'], FILTER_VALIDATE_EMAIL)) :
                $data['empEmail_err'] = 'Invalid Email Address';
            endif;

            // Validate Gender
            if (!isset($_POST['gender']  ) ) :
                $data['gender_err'] = 'Choose one';
            endif;

            // Make sure errors are empty
            if( empty($data['empID_err']) && empty($data['first_name_err']) 
                && empty($data['last_name_err']) && empty($data['empDOB_err']) 
                && empty($data['gender_err'])  ) :

                // Validated, then Add Employee
                if($this->empModel->addEmployee($data)) :
                    $this->empModel->addEmail($data);
                    
                    //$this->empModel->addDept($data);
                    flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');

                   // flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . $newID . '">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                    //flashSection('complete_reg', 'Employee registered successfully! <br/> Click here to Complete Registration ', 'p-3 mb-2 bg-primary text-white shadow-sm');
                   // echo PDO::lastInsertId();
                
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
           
            $data = [
                'title'             => 'New Employee Pre-Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => '',
                'empTitle'          => '',
                'first_name'        => '',
                'middle_name'       => '',
                'last_name'         => '',
                'empDOB'            => '',
                'gender'            => '',
                'empEmail'          => '',
                'hire_date'         => '',

                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'        => '',
                'empEmail_err'      => '',
                'hiredOn_err'       => ''
            ];

            $this->view('employees/add', $data);
        }
    }

*/