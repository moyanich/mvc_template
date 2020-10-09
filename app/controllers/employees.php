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
            'newtitle'      => 'Pre-Register New Employee',
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

    /************************************** PROFILE SECTION */  

    /**
     * View Employee Profile
    */
    public function profile($empID) {

        $employeeData = $this->empModel->getEmployeebyID($empID);
        $fullJobHistory = $this->empModel->getEmpJobHistory($empID);
        

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
            'address'           => $employeeData->address,
            'city'              => $employeeData->city,
            'parish'            => $employeeData->parish,
            'phoneOne'          => phoneFormat($employeeData->phoneOne),
            'mobile'            => phoneFormat($employeeData->mobile),
            'retirement'        => $employeeData->retirementDate,
            'job'               => $employeeData->title,
            'name'              => $employeeData->name,
            'fullJobHistory'    => $fullJobHistory,
            'internalEmail'     => $employeeData->internalEmail,
            'externalEmail'     => $employeeData->externalEmail,
            'hire_date'         => $employeeData->hire_date,
            'empAge'            => calcAge($employeeData->empDOB)
            
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
                'address'           => trim($_POST['address']),
                'city'              => trim($_POST['city']),
                'parish'            => trim($_POST['parish']),
                'parishName'        => $parish,
                'modified_at'       => date("Y-m-d H:i:s"),
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
            if(empty($data['first_name_err']) 
                && empty($data['last_name_err']) 
                && empty($data['empDOB_err']) 
                && empty($data['phoneOne_err']) 
                && empty($data['phoneTwo_err']) 
                && empty($data['address_err']) 
                && empty($data['city_err']) 
                && empty($data['trn_err']) 
                && empty($data['nis_err']) 
                && empty($data['gender_err'])
                && empty($data['externalEmail_err'])
                ) {
                
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
                } 

                else if ($data['gender'] == "Female" && $this->retirementModel->calcRetirementFemale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementFemale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->femaleResult, $data) ) {
                        flashMessage('update_success', 'Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $empID . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $empID . '', $data);
                    }
                } 
                else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/edit/' . $empID . '', $data);
                }
            } else {
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
                'parish'            => $empData->parish,
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


    /************************************** COMPANY SECTION */  

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
                if($this->empModel->updateCompanyProfile($data) ) {
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
    
    /************************************** JOB SECTION */  

            
    /*public function test() {
        if(isset($data['jobID'])) {
            // Check if Job field is empty
           $jobtitle = $this->jobModel->getJobByID($data['jobID']);
           $jobtitle = $jobtitle->title;
          echo  $data['job_title'] = '<input type="text" name="job_title" value="' . $data['job_title'] . '">';
      
       }

    } */

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
            
            if( empty($data['job_err']) && empty($data['relDeptID_err']) && empty($data['date_promoted_err']) ) {
                if($this->empModel->insertJob($data) ) {
                    $jobtitle = $this->jobModel->getJobByID($data['jobID']);
                    if($jobtitle->title == "Supervisor") {
                        $this->empModel->addSupervisors($data);
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
                    flashMessage('update_success', 'Job updated <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-info bg-info text-white');
                    $this->view('employees/editjob', $data);
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




   /* public function validateJob() {
        if(isset($_POST['job']) ) {  
            $job = $_POST['job'];
            if(empty($job) ) {
               echo 'Please enter a job title';
            }
        } 
    }
    */






} //end Class























/*


/**
     * Edit Employee Profile
  

    public function edit($id) {
        $empData = $this->empModel->getEmployeeByID($id);
        
       // $depInfo = $this->empModel->getCompanyInfo($id);
        $parish = $this->adminModel->getParishes();
        $genders = $this->empModel->listGenders();

        $retireMale = $this->retirementModel->getMaleRetirement();
        $retireFemale =  $this->retirementModel->getFemaleRetirement();
        
        // Employee Profile
        if(isset($_POST["updateProfile"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {

         

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'id'                => $id,
                'empID'             => $empData->empID,
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'gender'            => trim($_POST['gender']),
                'empDOB'            => trim($_POST['empDOB']),
                'retirementDate'    => formatDate($empData->retirementDate),
                'maleYears'         => $retireMale->years,
                'femaleYears'       => $retireFemale->years,
                'trn'               => trim($_POST['trn']),
                'nis'               => trim($_POST['nis']),
                'externalEmail'     => trim($_POST['externalEmail']),
                'phoneOne'          => trim($_POST['phoneOne']),
                'mobile'          => trim($_POST['mobile']),
                'address'           => trim($_POST['address']),
                'city'              => trim($_POST['city']),
                'parish'            => trim($_POST['parish']),
                'departments'       => '',
                'gendersList'       => $genders,
                'parishName'        => $parish,
                'modified_at'       => date("Y-m-d H:i:s"),
                
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
                'address_err'       => '',
                'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => ''
            ]; 

            // Validate First Name
            if(empty($data['first_name'])) :
                $data['first_name_err'] = 'Please enter a First Name';
            endif;

            // Validate Last Name
            if(empty($data['last_name'])) :
                $data['last_name_err'] = 'Please enter a Last Name';
            endif;

            // Validate Date
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
            }
            else if(strlen($data['trn']) > 9) {
                $data['trn_err'] = 'TRN is too long';
            }
            else if($this->empModel->checkForDuplicateTRN($data['trn'], $data['id']) ) :
                $data['trn_err'] = 'TRN already exists';
            endif; 

            // Validate nis
            if(empty($data['nis'])) {
                $data['nis_err'] = 'Please enter NIS';
            }
            else if(strlen($data['nis']) > 9) {
                $data['nis_err'] = 'NIS is too long';
            }
            else if($this->empModel->checkForDuplicateNIS($data['nis'], $data['id']) ) :
                $data['nis_err'] = 'NIS already exists';
            endif; 
          
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
          
            // Make sure errors are empty
            if(empty($data['first_name_err']) 
                && empty($data['last_name_err']) 
                && empty($data['empDOB_err']) 
                && empty($data['phoneOne_err']) 
                && empty($data['phoneTwo_err']) 
                && empty($data['address_err']) 
                && empty($data['city_err']) 
                && empty($data['trn_err']) 
                && empty($data['nis_err']) 
                && empty($data['gender_err']) ) {
                
                if($data['gender'] == "Male" && $this->retirementModel->calcRetirementMale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementMale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->result, $data) ) {

                        flashMessage('update_success', 'Profile Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $id . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $id . '', $data);
                    }
                } 

                else if ($data['gender'] == "Female" && $this->retirementModel->calcRetirementFemale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementFemale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->femaleResult, $data) ) {

                        flashMessage('update_success', 'Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $id . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $id . '', $data);
                    }
                } 
                
                else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/edit/' . $id . '', $data);
                }
            } else {
                // Load view with errors
                $this->view('employees/edit', $data);
            }
        } 
        // Company Profile
        else if(isset($_POST["compProfile"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {

           

            $data = [
                'id'                => $id,
                'empID'             => $empData->empID,
                'hire_date'         => trim($_POST['hire_date']),
                'internalEmail'     => trim($_POST['internalEmail']),
                'modified_at'       => date("Y-m-d H:i:s")
            ]; 

             // Validate Date
             if(isRealDate($data['hire_date'] ) ) :
                $data['hire_date_err'] = 'invalid date format';
            endif;

            $this->empModel->updateEmpCompProfile($data);


            flashMessage('companyUpdate_success', 'Company information updated!', 'alert alert-success bg-primary text-white');
            redirect('employees/edit/' . $id . ''); 


           
        }
        else {
            $retireMale = $this->retirementModel->getMaleRetirement();
            $retireFemale =  $this->retirementModel->getFemaleRetirement();

            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'employee'          => $empData->first_name . $empData->last_name,
                'id'                => $id,
                'empID'             => $empData->empID,
                'first_name'        => $empData->first_name,
                'middle_name'       => $empData->middle_name,
                'last_name'         => $empData->last_name,
                'gender'            => $empData->gender,
                'gendersList'       => $genders,
                'empDOB'            => $empData->empDOB,
                'retirementDate'    => formatDate($empData->retirementDate),
                'trn'               => $empData->trn,
                'nis'               => $empData->nis,
                'hire_date'         => $empData->hire_date,
                'phoneOne'          => $empData->phoneOne,
                'mobile'          => $empData->mobile,
                'externalEmail'     => $empData->externalEmail,
                'internalEmail'     => $empData->internalEmail,
                'address'           => $empData->address,
                'city'              => $empData->city,
                'parish'            => $empData->parish,
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
                'hire_date_err'     => '',
                'internalEmail_err' => ''
            ];

            $this->view('employees/edit', $data);
        }   
    } 




    */





 /**
     * Edit Employee Company Profile
    */
   /* public function editCompany() {

       // $compInfo = $this->empModel->getCompanyInfo($id);
    

        // UpdateCompanyProfile
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'id'                => trim($_POST['id']),
                'empID'             => trim($_POST['empID']),
                'hire_date'         => trim($_POST['hire_date']),
                'modified_at'       => date("Y-m-d H:i:s")
            ]; 

            $this->empModel->updateCompanyProfile($data);
            $this->view('employees/edit/' . $id . '', $data);

        }

    } */





 /* 'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
                'address_err'       => '',
                'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => '' */


                /* $data = [
                // 'id'                => $id,
                    //'hire_date'         => $compInfo->hire_date,
                // 'internalEmail'     => $compInfo->internalEmail,


                    /* 'first_name_err'    => '',
                    'last_name_err'     => '',
                    'empDOB_err'        => '',
                    'phoneOne_err'      => '',
                    'phoneTwo_err'      => '',
                    'address_err'       => '',
                    'city_err'          => '',
                    'trn_err'           => '',
                    'nis_err'           => '' 
                ];

                $this->view('employees/edit', $data);*/














 /* 
              
              WORKS
              
              if($this->empModel->updateProfile($data) ) {

                    if($data['gender'] == "Male" && $this->empModel->calcRetirements($data) ){  
                        $retirementDate = $this->empModel->calcRetirements($data);
                        if($this->empModel->updateRetirement($retirementDate->result, $data) ) {
                            flashMessage('update_success', 'Update Successful!', 'alert alert-success bg-primary text-white');
                            redirect('employees/edit/' . $id . ''); 
                           
                        }

    
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $id . '', $data);
                    }
                    
                } else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/edit/' . $id . '', $data);
                } */







  /*

  //Validate Phones
          if (strlen($data['phoneOne']) < 7 || strlen($data['phoneOne']) > 10) {
                $data['phoneOne_err'] = 'Invalid Phone Number';
            } 



           /*   // GET data from Form
           $data = [
            'title'             => 'Edit Profile',
            'employee'          => $profileData->first_name . '"  "' . $profileData->last_name,
            'empID'             => '',
            'first_name'        => trim($_POST['first_name']),
            
            'last_name'         => trim($_POST['last_name']),
            
            
            'phoneOne'          => trim($_POST['phoneOne']),
            'first_name_err'    => '',
            'phoneOne_err'      => ''
           'retirement'        => $retirement->retirementDate
           'departments' => $deptHistory,
            'id' => $id,
            'deptCode' => trim($_POST['deptCode']),
            'deptName' => trim($_POST['deptName']),
            'modified_on' => date("Y-m-d H:i:s"),
            'deptCode_err' => '',
            'deptName_err' => '' 
        ]; */









 /*
            $data = [
                
                'retirement'        => date("F j, Y", strtotime($profileData->retirementDate)), 
                //'empEmail'          => $profileData->emailAddress,
                'hire_date'         => date("F j, Y", strtotime($profileData->hire_date)),
                'phoneOne'          => phoneFormat($profileData->phoneOne),
                'mobile'          => phoneFormat($profileData->mobile),
                'phoneOne_err'      => ''
                
            ]; */

    /*

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
*/





 // $retirement = calcRetirement($data['gender'], $data['empDOB'], $retireFemale->years, $retireMale->years);
            
            //$retirement = $this->empModel->calcRetirementMale($data);



                    // Add Retirement Date by Gender
                   /* if ($data['gender'] = "Male") :
                        
                       // $this->retirementModel->setNewEmpRetirement($data['empID'], $data['gender'], $data['empDOB'], $retireMale->years);

                        //$this->retirementModel->updateMaleRetirement($data['empID'], $data['gender'], $data['empDOB'], $retireMale->years);
                        //$this->empModel->addDept($data);
                        flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                        redirect('employees/add');

                    elseif ($data['gender'] = "Female") :

                        if($this->retirementModel->setNewFemaleEmpRetirement($data));

                       // $this->retirementModel->updateFemaleRetirement($data['empID'], $data['gender'], $data['empDOB'], $retireFemale->years);
                       //$this->empModel->addDept($data);
                        flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                        redirect('employees/add');
                    endif; */



























































/*
    // your date of birth
    $dateOfBirth = '1950-11-26';
    // date when he'll turn 50
    $dateToFifty = date('Y-m-d', strtotime($dateOfBirth . '+50 Years'));
    // current date
    $currentDate = date('Y-m-d');
    $result = 'retired';



    // checks if already fifty
    if($currentDate <= $dateToFifty) {
        $result = $dateToFifty;
    }
    echo $result;
*/





  // Get existing Department Information from model
           /* $editDept = $this->deptModel->findDepartmentById($id);
            $deptHistory = $this->deptModel->getLastID(); */

            //$empDemographic = $this->empModel->getGenderDOB();

            /*if($employeeData->gender == "Female") {
                $retirement = $this->adminModel->getFemaleRetirement();
                $employeeData->empDOB;
                $dateToFifty = date('Y-m-d', strtotime($employeeData->empDOB));
            }
            if($employeeData->gender == "Male") {
                $retirement = $this->adminModel->getMaleRetirement();
            } */

















 /**
     * Add Employee
     */ /*
    public function add() {
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data   
            /*
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $departments = $this->deptModel->getDepartments();
            
            $data = [
                'title'             => 'Employee Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => trim($_POST['empID']),
                'empTitle'          => trim($_POST['empTitle']),
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'empDOB'            => trim($_POST['empDOB']),
                'gender'         => trim($_POST['gender']),
                'empEmail'          => trim($_POST['empEmail']),
                'hire_date'         => trim($_POST['hiredOn']),
                'relDeptID'         => trim($_POST['relDeptID']),

                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'     => '',
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

            // Validate Hired Date
            if(empty($data['hiredOn'])) :
                $data['hiredOn_err'] = 'Please enter Date';
            elseif (!isRealDate($data['hiredOn'])) :
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

            if(!isset($_POST['relDeptID']) || ($data['relDeptID'] == 0) ) :
                $data['relDeptID_err'] = 'Please select a Department';
            endif;



         

            // Make sure errors are empty
            
            if( empty($data['empID_err']) && empty($data['first_name_err']) 
                && empty($data['last_name_err']) && empty($data['empDOB_err']) 
                && empty($data['gender_err']) && empty($data['relDeptID_err'])   ) :

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
           
            $data = [
                'title'             => 'Employee Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => '',
                'empTitle'          => '',
                'first_name'        => '',
                'middle_name'       => '',
                'last_name'         => '',
                'empDOB'            => '',
                'gender'         => '',
                'empEmail'          => '',
                'hire_date'         => '',
                'relDeptID'         => '',


                
                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'     => '',
                'empEmail_err'      => '',
                'relDeptID_err'     => ''

                
                
            ];

            $this->view('employees/add', $data);

        }
    }



    */

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



/*


     * Edit Department
   
    public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $deptHistory = $this->deptModel->getLastID();
    
            // GET data from Form
            $data = [
                'title' => 'Edit Department',
                'description' => 'Edit a department record',
                'departments' => $deptHistory,
                'id' => $id,
                'deptCode' => trim($_POST['deptCode']),
                'deptName' => trim($_POST['deptName']),
                'modified_on' => date("Y-m-d H:i:s"),
                'deptCode_err' => '',
                'deptName_err' => ''
            ]; 

            // Validate deptCode
            if(empty($data['deptCode'])) {
                $data['deptCode_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            }
            else if($this->deptModel->checkForDuplicateCode($data['deptCode'], $data['id']) ){
                $data['deptCode_err'] = 'Department already exists!';
                $this->view('departments/edit', $data);
            } 

            // Validate deptName
            if(empty($data['deptName'])) {
                $data['deptCode_err'] = 'Department Code already exists';
                $this->view('departments/edit', $data);
            }
            else if($this->deptModel->checkForDuplicateName($data['deptName'], $data['id']) ){
                $data['deptName_err'] = 'Department name already exists!';
                $this->view('departments/edit', $data);
            } 
            

            if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                // Update Department
               if($this->deptModel->editDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                } 
            }
        } 
        else {

            // Get existing Department Information from model
            $editDept = $this->deptModel->findDepartmentById($id);
            $deptHistory = $this->deptModel->getLastID();

            $data = [
                'title' => 'Edit Department',
                'description' => 'Make changes to a department record',
                'departments' => $deptHistory,
                'id' => $id,
                'deptCode' => $editDept->deptCode,
                'deptName' => $editDept->deptName,
                'deptCode_err' => '',
                'deptName_err' => ''
            ];
    
            $this->view('departments/edit', $data);
        }
    }


    */