<?php

class Employees extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->adminModel = $this->model('Admins');
        $this->empModel = $this->model('Employee');
        $this->deptModel = $this->model('Department');
        $this->retirementModel = $this->model('Retirement');
        $this->jobModel = $this->model('Job');
    }

    /*
    * Displays Index
    */
    public function index() {
        $employees = $this->empModel->getEmployees();
       
        $data = [
            'title'         => 'Employees',
            'singlular'     => 'Employee',
            'description'   => 'Displays a list of the Employees in the company',
            'employees'     => $employees
        ];
        
        $this->view('employees/index', $data);
    }


    /**
     * Get the male retirement years
    */
    public function getMaleRetire() {
        $retireMale = $this->retirementModel->getMaleRetirement();

        if(isset($_POST['gender']) && isset($_POST['dob'])) {  

            $dob = trim($_POST['dob']);
            $date = new DateTime($dob);
            //Create a new DateInterval object using P30D.
            $interval = new DateInterval('P' . $retireMale->years . 'Y');
            //Add the DateInterval object to our DateTime object.
            $date->add($interval);
            //Print out the result.
            echo '<input type="hidden" id="retirementDate" name="retirementDate" class="form-control" value = "' . $date->format('Y-m-d') . '">';
          // echo '<input type="date" id="retirementDate" name="retirementDate" class="form-control" value = "' . $date->format('Y-m-d') . '" disabled />'; 
        } 
    }


    /**
     * Get the female retirement years
     */
    public function getFemaleRetire() {
        $retireFemale = $this->retirementModel->getFemaleRetirement();

        if(isset($_POST['gender']) && isset($_POST['dob'])) {  
            $dob = trim($_POST['dob']);
            $date = new DateTime($dob);
            //Create a new DateInterval object using P30D.
            $interval = new DateInterval('P' . $retireFemale->years . 'Y');
            //Add the DateInterval object to our DateTime object.
            $date->add($interval);
            //Print out the result.
            echo '<input type="hidden" id="retirementDate" name="retirementDate" class="form-control" value = "' . $date->format('Y-m-d') . '">';
        } 
    }


    public function address() {
       
    }


    /***********************************************************
     * PROFILE SECTION 
    *************************************************************/    

   
    /**
     * Add New Employee
     */
    public function add() {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $departments = $this->deptModel->getDepartments();
            
            $data = [
                'title'             => 'New Employee Pre-Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => trim($_POST['empNo']),
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'empDOB'            => trim($_POST['empDOB']),
                'gender'            => trim($_POST['gender']),
                'hire_date'         => trim($_POST['hiredOn']),
                'retirementDate'    => trim($_POST['retirementDate']),
                'created_date'      => date("Y-m-d H:i:s"),
                'created_by'        => $_SESSION['userID'],
                'maleYears'         => trim($_POST['maleYears']),
                'femaleYears'       => trim($_POST['femaleYears']),
                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'        => '',
                'hiredOn_err'       => '',
                'created_by'        => $_SESSION['userID']
            ];

            // Validate empID
            if(empty($data['empID'])) :
                $data['empID_err'] = 'Please enter an employee ID';
            elseif (strlen($data['empID']) > 11) :
                $data['empID_err'] = 'Employee ID should be 6 characters or less';
            else :
                if($this->empModel->findDuplicateEmpID($data['empID'])) :
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
            elseif (isRealDate($data['empDOB'])) :
                $data['empDOB_err'] = 'Invalid Date';
            endif;

            // Validate Hired Date
            if(empty($data['hire_date'])) :
                $data['hiredOn_err'] = 'Please enter Date';
            elseif (isRealDate($data['hire_date'])) :
                $data['hiredOn_err'] = 'Invalid Date';
            endif;

            // Validate Gender
            if (!isset($_POST['gender']  ) ) :
                $data['gender_err'] = 'Choose one';
            endif;
          
            // Make sure errors are empty
            if( empty($data['empID_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['empDOB_err']) && empty($data['gender_err'])  ) {
                if($this->empModel->addEmployee($data) ) {
                    flashMessage('add_success', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                    redirect('employees/add'); 
                }
            } else {
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/add', $data);
            }
        } 
        else {

            $employees = $this->empModel->getEmployees();
            $departments = $this->deptModel->getDepartments();
            $retireMale = $this->retirementModel->getMaleRetirement();
            $retireFemale =  $this->retirementModel->getFemaleRetirement();
            
            $data = [
                'title'             => 'New Employee Pre-Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => '',
                'first_name'        => '',
                'middle_name'       => '',
                'last_name'         => '',
                'empDOB'            => '',
                'gender'            => '',
                'maleYears'         => $retireMale->years,
                'femaleYears'       => $retireFemale->years,
                'retirementDate'    => '',
                'hire_date'         => '',
                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'        => '',
                'hiredOn_err'       => ''
            ];

            $this->view('employees/add', $data);
        }
    }


    /**
     * View Employee Profile
    */
    public function profile($empID) {

        $employeeData = $this->empModel->getEmployeebyID($empID);
        $fullJobHistory = $this->empModel->getEmpJobHistory($empID);
        $supervisor = $this->empModel->reportsToSupervisor($employeeData->deptID);
        $manager = $this->empModel->reportsToManager($employeeData->deptID);

        $editAddress = false;
        if($this->empModel->addressExists($empID) == true) {
            $editAddress = 'true';
        } 

        // $employeeDept = $this->empModel->getEmpDepartment($empID);
       // $jobTitle = $this->empModel->getEmpJobTitle($empID);
       // $jobHistory = $this->empModel->getjobHistory($id);
       // $allJobs = $this->jobModel->allJobs();
       // $deptInfo = $this->empModel->getEmpCompInfoByID($id);
       
        $data = [
            'title'             => 'Employee Profile',
            'description'       => 'Employee record',
            'empID'             => $empID,
            'trn'               => trnFormat($employeeData->trn),
            'nis'               => $employeeData->nis,
            'first_name'        => $employeeData->first_name,
            'middle_name'       => $employeeData->middle_name,
            'last_name'         => $employeeData->last_name,
            'empDOB'            => $employeeData->empDOB,
            'gender'            => $employeeData->gender,
            'editAddress'       => $editAddress,
            'address'           => $employeeData->address,
            'city'              => $employeeData->city,
            'parish'            => $employeeData->parishName,
            'phoneOne'          => phoneFormat($employeeData->phoneOne),
            'mobile'            => phoneFormat($employeeData->mobile),
            'retirement'        => $employeeData->retirementDate,
            'job'               => $employeeData->title,
            'name'              => $employeeData->name,
            'fullJobHistory'    => $fullJobHistory,
            'internalEmail'     => $employeeData->internalEmail,
            'externalEmail'     => $employeeData->externalEmail,
            'hire_date'         => $employeeData->hire_date,
            'empAge'            => calcAge($employeeData->empDOB),
            'supervisor'        => $supervisor,
            'manager'           => $manager
            
        ]; 


        $this->view('employees/profile', $data);
     
    }
    

    /**
     * Edit Employee Profile
    */
    public function edit($empID) {
        $empData = $this->empModel->getEmployeeByID($empID);
        $parish = $this->adminModel->getParishes();
        $genders = $this->empModel->listGenders();
        $retireMale = $this->retirementModel->getMaleRetirement();
        $retireFemale =  $this->retirementModel->getFemaleRetirement();

        // Employee Profile
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'empID'             => $empID,
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'gender'            => trim($_POST['gender']),
                'gendersList'       => $genders,
                'empDOB'            => trim($_POST['empDOB']),
                'retirementDate'    => formatDate($empData->retirementDate),
                'maleYears'         => $retireMale->years,
                'femaleYears'       => $retireFemale->years,
                'trn'               => trim($_POST['trn']),
                'nis'               => trim($_POST['nis']),
                'externalEmail'     => trim($_POST['externalEmail']),
                'phoneOne'          => trim($_POST['phoneOne']),
                'mobile'            => trim($_POST['mobile']),
               // 'address'           => trim($_POST['address']),
              //  'city'              => trim($_POST['city']),
                //'parish'            => trim($_POST['parish']),
                'parishName'        => $parish,
                'created_at'        => date("Y-m-d H:i:s"),
                'modified_at'       => date("Y-m-d H:i:s"),
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
              //  'address_err'       => '',
               // 'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => '',
                'externalEmail_err' => ''
            ]; 

            // Validate First Name
            if(empty($data['first_name'])) :
                $data['first_name_err'] = 'Please enter a First Name';
            endif;

            // Validate Last Name
            if(empty($data['last_name'])) :
                $data['last_name_err'] = 'Please enter a Last Name';
            endif;

            // Validate DOB
            if(isRealDate($data['empDOB'] ) ) :
                $data['empDOB_err'] = 'invalid date format';
            endif; 

            // Validate City
            if(strlen($data['city']) > 20) :
                $data['city_err'] = 'Text is too long';
            endif; 

            // Validate trn
            if(empty($data['trn'])) {
                $data['trn_err'] = 'Please enter TRN';
            } else if(strlen($data['trn']) != 9) {
                $data['trn_err'] = 'Invalid TRN';
            } else if($this->empModel->checkForDuplicateTRN($data['trn'], $data['empID']) ) {
                $data['trn_err'] = 'TRN already exists';
            }

            // Validate nis
            if(empty($data['nis'])) {
                $data['nis_err'] = 'Please enter NIS';
            } else if(strlen($data['nis']) > 9) {
                $data['nis_err'] = 'NIS is too long';
            } else if($this->empModel->checkForDuplicateNIS($data['nis'], $data['empID']) ) {
                $data['nis_err'] = 'NIS already exists';
            }
          
            if(!empty($data['phoneOne']) ) {
                if(validate_phone_number($data['phoneOne']) == false ) {
                    $data['phoneOne_err'] = 'Invalid Phone Number';
                }
            }
            
            if(!empty($data['mobile']) ) {
                if(validate_phone_number($data['mobile']) == false ) {
                    $data['phoneTwo_err'] = 'Invalid Phone Number';
                }
            }

            // Filter Email
            if(!empty($data['externalEmail']) ) {
                if (validateEmail($data['externalEmail']) == false) :
                    $data['externalEmail_err'] = 'Invalid Email Address';
                endif; 
            }

            // Filter Email
            if(!empty($data['internalEmail']) ) {
                if (validateEmail($data['internalEmail']) == false) :
                    $data['internalEmail_err'] = 'Invalid Email Address';
                endif; 
            }

            // Make sure errors are empty
            if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['empDOB_err']) && empty($data['phoneOne_err']) 
                && empty($data['phoneTwo_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['trn_err']) 
                && empty($data['nis_err']) && empty($data['gender_err']) && empty($data['externalEmail_err'])) {
                
                if($data['gender'] == "Male" && $this->retirementModel->calcRetirementMale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementMale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->result, $data) ) {
                        flashMessage('update_success', 'Profile Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $empID . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $empID . '', $data);
                    }
                } else if ($data['gender'] == "Female" && $this->retirementModel->calcRetirementFemale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementFemale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->femaleResult, $data)) {
                        flashMessage('update_success', 'Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $empID . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $empID . '', $data);
                    }
                } else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/edit/' . $empID . '', $data);
                }
            } 
            else {
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/edit', $data);
            }
        } 
        else {
            $retireMale = $this->retirementModel->getMaleRetirement();
            $retireFemale =  $this->retirementModel->getFemaleRetirement();
            
            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'employee'          => $empData->first_name . $empData->last_name,
                'empID'             => $empID,
                'first_name'        => $empData->first_name,
                'middle_name'       => $empData->middle_name,
                'last_name'         => $empData->last_name,
                'gender'            => $empData->gender,
                'gendersList'       => $genders,
                'empDOB'            => $empData->empDOB,
                'retirementDate'    => formatDate($empData->retirementDate),
                'trn'               => $empData->trn,
                'nis'               => $empData->nis,
                'phoneOne'          => $empData->phoneOne,
                'mobile'            => $empData->mobile,
                'externalEmail'     => $empData->externalEmail,
                'address'           => $empData->address,
                'city'              => $empData->city,
                'parishID'          => $empData->id,
                'parish'            => $empData->parishName,
                'parishName'        => $parish,
                'modified_at'       => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
                'address_err'       => '',
                'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => '',
                'externalEmail_err' => ''
            ];

            $this->view('employees/edit', $data);
        }   
    }



    public function editAddress($empID) {
        $empData = $this->empModel->getEmployeeByID($empID);
        $parish = $this->adminModel->getParishes();

        // Employee Profile
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'empID'             => $empID,
                'address'           => trim($_POST['address']),
                'city'              => trim($_POST['city']),
                'parish'            => trim($_POST['parish']),
                'parishName'        => $parish,
                'created_at'        => date("Y-m-d H:i:s"),
                'modified_at'       => date("Y-m-d H:i:s"),
                'address_err'       => '',
                'city_err'          => ''
            ]; 

           
            // Make sure errors are empty
           // if(empty($data['address_err']) && empty($data['city_err']) && empty($data['trn_err']) ) {

                if( $this->empModel->addressExists($data) == true) {
                    if( $this->empModel->updateAddress($data) ) {
                        flashMessage('update_success', 'Profile Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/editAddress/' . $empID . ''); 
                    }        
                } else {
                    if( $this->empModel->insertAddress($data) ) {
                        flashMessage('update_success', 'Profile Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/editAddress/' . $empID . ''); 
                    }
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/editAddress/' . $empID . '', $data);
                } 
           // } 
           /* else {
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/editAddress', $data);
            } */
        } 
        else {
            $retireMale = $this->retirementModel->getMaleRetirement();
            $retireFemale =  $this->retirementModel->getFemaleRetirement();
            
            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'employee'          => $empData->first_name . $empData->last_name,
                'empID'             => $empID,
                'address'           => $empData->address,
                'city'              => $empData->city,
                'parishID'          => $empData->id,
                'parish'            => $empData->parishName,
                'parishName'        => $parish,
                'modified_at'       => '',
                'address_err'       => '',
                'city_err'          => ''
            ];

            $this->view('employees/editAddress', $data);
        }   
    }





    


    /**
     * Delete Employee
    */
    public function delete($empID) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            /*
             * Process Form and Sanitize POST data
            */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'empID'  => check_input($_POST['empNo']),
            ];

            if($this->empModel->deleteEmployee($empID)) {
                flashMessage('delete_emp_success', 'Employee Deleted!', 'alert alert-success mt-3');
                redirect('employees');
            } else {
                flashMessage('delete_emp_failure', 'An error occured', 'alert alert-warning mt-3');
                redirect('employees/profile/' . $data['empID'] . '');
            } 
        }
        else { 
            $data = [
                'empID'  => '',
            ];

            redirect('employees');
        }
    }


    /***********************************************************
     * COMPANY SECTION 
    *************************************************************/    

    /**
     * Edit Employee Company Profile
    */
    public function companyinfo($empID) {
        $empData = $this->empModel->getEmployeeByID($empID);
       
        // Employee Profile
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // GET data from Form
            $data = [
                'title'             => 'Company information',
                'empID'             => $empID,
                'first_name'        => $empData->first_name,
                'last_name'         => $empData->last_name,
                'internalEmail'     => trim($_POST['internalEmail']),
                'hire_date'         => trim($_POST['hire_date']),
                'modified_at'       => date("Y-m-d H:i:s"),
                'hire_date_err'     => '',
                'internalEmail_err' => ''
            ]; 

            // Validate Hire Date
            if(isRealDate($data['hire_date'] ) ) :
                $data['hire_date_err'] = 'Invalid date format';
            endif;
           
            // Filter Email
            if(!empty($data['internalEmail']) ) {
                if (validateEmail($data['internalEmail']) == false) :
                    $data['internalEmail_err'] = 'Invalid Email Address';
                endif; 
            }

            // Make sure errors are empty
            if(empty($data['hire_date_err']) && empty($data['internalEmail_err']) ) {
                if( $this->empModel->updateCompanyProfile($data) ) {
                    flashMessage('update_success', 'Company Information Update Successful!', 'alert alert-success bg-primary text-white');
                    redirect('employees/companyinfo/' . $empID . ''); 
                } else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/companyinfo/' . $empID . '', $data);
                }
            } else {            // Load view with errors
                $this->view('employees/companyinfo', $data);
            }
        }  else {
            $data = [
                'title'             => 'Company information',
                'empID'             => $empID,
                'first_name'        => $empData->first_name,
                'last_name'         => $empData->last_name,
                'hire_date'         => $empData->hire_date,
                'internalEmail'     => $empData->internalEmail,
                'hire_date_err'     => '',
                'internalEmail_err' => ''
            ];

            $this->view('employees/companyinfo', $data);
        }   
    }
    

    /***********************************************************
     * JOB SECTION 
    *************************************************************/  
          
    /**
     * Add Job
     * 
     * Inherits from the Profile function
    */
    public function jobs($empID) {
        $empData = $this->empModel->getEmployeebyID($empID);
        $fullJobHistory = $this->empModel->getEmpJobHistory($empID);
        $departments = $this->deptModel->getDepartments();
        $allJobs = $this->jobModel->jobtitles();
      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             *  Process Form and Sanitize POST data
            */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'             => 'Add New Position',
                'first_name'        => $empData->first_name,
                'last_name'         => $empData->last_name,
                'description'       => 'Job History',
                'empID'             => $empID,
                'jobID'             => check_input($_POST['job']),
                'deptID'            => check_input($_POST['relDeptID']),
                'from_date'         => check_input($_POST['date_promoted']),
                'to_date'           => check_input($_POST['date_to']),
                'created_date'      => date("Y-m-d H:i:s"),
                'created_by'        => $_SESSION['userID'],
                'jobs'              => $allJobs,
                'deptList'          => $departments,
                'fullJobHistory'    => $fullJobHistory,
                'relEmpID_err'      => '',
                'job_err'           => '',
                'relDeptID_err'     => '',
                'date_promoted_err' => '',
                'date_to_err'       => ''
            ];

            // Check if Job field is empty
            if($this->jobModel->checkIfJobIDExists($data['jobID']) == false  ) {
                $data['job_err'] = 'Invalid Job';
            }
            
            // Check if department exists
            if($this->deptModel->checkIfDeptIDExists($data['deptID']) == false ) {
                $data['relDeptID_err'] = 'Invalid Department';
            }
            
            // Validate Date
            if(isRealDate($data['from_date'] ) ) :
                $data['date_promoted_err'] = 'invalid date format';
            endif; 

            // Validate Date
            if(isRealDate($data['to_date'] ) ) :
                $data['date_promoted_err'] = 'invalid date format';
            endif; 

            // Validate Date
            if(isRealDate($data['to_date'] ) ) :
                $data['date_to_err'] = 'Invalid date format';
            endif; 

            $jobtitle = $this->jobModel->getJobByID($data['jobID']);
            
            if( empty($data['job_err']) && empty($data['relDeptID_err']) && empty($data['date_promoted_err']) ) {
                if($this->empModel->insertJob($data) ) {

                    if( $jobtitle->title == "Supervisor" ) {
                        $this->empModel->addSupervisors($data);
                    }
                    else if( $jobtitle->title == "Manager" ) {
                        $this->empModel->addManagers($data);
                    }

                    flashMessage('add_success', 'Employee Job title successfully!', 'alert alert-success bg-primary text-white');
                    redirect('employees/jobs/' . $empID . ''); 
                } else {
                    flashMessage('add_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    redirect('employees/jobs/' . $empID . '');
                }
            } else {
                flashMessage('add_error', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/jobs', $data);
            } 

            
        } else {
            $data = [
                'title'             => 'Add New Position',
                'first_name'        => $empData->first_name,
                'last_name'         => $empData->last_name,
                'description'       => 'Job History',
                'empID'             => $empID,
                'jobID'             => '',
                'deptID'            => '',
                'from_date'         => '',
                'to_date'           => '',
                'jobs'              => $allJobs,
                'fullJobHistory'    => $fullJobHistory,
                'deptList'          => $departments,
                'created_by'        => '',
                'relEmpID_err'      => '',
                'job_err'           => '',
                'relDeptID_err'     => '',
                'date_promoted_err' => '',
                'date_to_err'       => ''
            ];

            $this->view('employees/jobs', $data);
        }
    }


    /**
     * Delete Job 
    */
    public function deletejob($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            /*
             * Process Form and Sanitize POST data
            */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'empID'  => check_input($_POST['empNo']),
            ];

            if($this->empModel->deleteJobHistory($id)) {
                flashMessage('delete_success', 'Department Deleted!', 'alert alert-success mt-3');
                redirect('employees/profile/' . $data['empID'] . '');
            } else {
                flashMessage('delete_failure', 'An error occured', 'alert alert-warning mt-3');
            } 
        }
        else { 
            $data = [
                'empID'  => '',
            ];

            redirect('employees/profile/' . $data['empID'] . '');
        }
    }


    /**
     * Edit Job 
    */
    public function editjob($id) {
       
        $departments = $this->deptModel->getDepartments();
        $allJobs = $this->jobModel->jobtitles();
        $showJobByID = $this->empModel->getJobByID($id);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            /*
             * Process Form
            */
            // Sanitize POST data
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'             => 'Update Job History',
                'description'       => 'Job History',
                'id'                => $id,
                'empID'             => $showJobByID->empID,
                'jobID'             => check_input($_POST['job']),
                'deptID'            => check_input($_POST['relDeptID']),
                'from_date'         => check_input($_POST['date_promoted']),
                'to_date'           => check_input($_POST['date_to']),
                'modified_on'       => date("Y-m-d H:i:s"),
                'created_by'        => $_SESSION['userID'],
                'position'          => $showJobByID->title,
                'name'              => $showJobByID->name,
                'deptList'          => $departments,
                'job_err'           => '',
                'relDeptID_err'     => '',
                'date_promoted_err' => '',
                'date_to_err'       => ''
            ];

            // Check if Job exists
            if($this->jobModel->checkIfJobIDExists($data['jobID']) == false  ) {
                $data['job_err'] = 'Invalid Job';
            }
            
            // Check if Department exists
            if($this->deptModel->checkIfDeptIDExists($data['deptID']) == false ) {
                $data['relDeptID_err'] = 'Invalid Department';
            }
            
            // Validate Date
            if(isRealDate($data['from_date'] ) ) :
                $data['date_promoted_err'] = 'Invalid date format';
            endif; 

            // Validate Date
            if(isRealDate($data['to_date'] ) ) :
                $data['date_to_err'] = 'Invalid date format';
            endif; 

            // Make sure errors are empty
            if( empty($data['job_err']) && empty($data['relDeptID_err']) && empty($data['date_promoted_err']) && empty($data['date_to_err']) ) {
                if($this->empModel->updateJobByID($data) ) {

                    $jobtitle = $this->jobModel->getJobByID($data['jobID']);

                    if( $jobtitle->title == "Supervisor" ) {
                        if($this->empModel->checkIfSupervisorExist($data) == true) {
                            $this->empModel->updateSupervisors($data);
                        }
                        else {
                            $this->empModel->addSupervisors($data);
                        }
                    }
                    else if($jobtitle->title == "Manager" ) {
                        if($this->empModel->checkIfManagerExist($data) == true) {
                            $this->empModel->updateManager($data);
                        }
                        else {
                            $this->empModel->addManagers($data);
                        }
                    } 
 
                    flashMessage('update_success', 'Job updated!', 'alert alert-info bg-primary text-white');
                    //$this->view('employees/editjob', $data);
                   
                    redirect('employees/editjob/' . $id . '');

                }
            } else {
                flashMessage('update_failure', 'Update Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/editjob', $data);
            }
        }
        else { 
            $data = [
                'title'             => 'Update Job History',
                'description'       => 'Job History',
                'id'                => $id,
                'empID'             => $showJobByID->empID,
                'jobID'             => $showJobByID->jobID,
                'deptID'            => $showJobByID->deptID,
                'from_date'         => $showJobByID->from_date,
                'to_date'           => $showJobByID->to_date,
                'position'          => $showJobByID->title,
                'name'              => $showJobByID->name,
                'jobs'              => $allJobs,
                'deptList'          => $departments,
                'job_err'           => '',
                'relDeptID_err'     => '',
                'date_promoted_err' => '',
                'date_to_err'       => ''
            ];

            $this->view('employees/editjob', $data);
        }
    }


} //end Class

