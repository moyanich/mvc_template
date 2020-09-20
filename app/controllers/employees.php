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
    }
    
    /*
    * Displays Index
    */
    public function index() {
        $employees = $this->empModel->allEmployees();
        $data = [
            'title'         => 'Employees',
            'singlular'     => 'Employee',
            'newtitle'      => 'Pre-Register New Employee',
            'description'   => 'Displays a list of the Employees in the company',
            'employees'     => $employees
        ];
        
        $this->view('employees/index', $data);
    }

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

            //echo '<input type="date" id="retirementDate" name="retirementDate" class="form-control" value = "' . $date->format('Y-m-d') . '" disabled />';
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

            // Validate Gender
            if (!isset($_POST['gender']  ) ) :
                $data['gender_err'] = 'Choose one';
            endif;
          
            // Make sure errors are empty
            if( empty($data['empID_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['empDOB_err']) && empty($data['gender_err'])  ) {

                if($this->empModel->addEmployee($data) ) {
                    flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                        redirect('employees/add'); 
                }

              /*  if($data['gender'] == "Male") {
                    if($this->empModel->addEmployee($data) && $this->retirementModel->setNewEmpMaleRetire($data)) {
                        echo 'male';
                        /*flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                            redirect('employees/add'); 
                    }

                }
                else if ($data['gender'] = "Female") {
                    echo 'female';
                }*/


               /* if($this->empModel->addEmployee($data)) {
                   
                        if($this->retirementModel->setNewEmpMaleRetire($data)) {
                            flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                            redirect('employees/add');
                        }
                    }
                    
                        if($this->retirementModel->setNewEmpFemaleRetire($data) ){
                            flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                            redirect('employees/add');
                        }
                    }

                } else {
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                } */

                // Validated, then Add Employee
               /* if($this->empModel->addEmployee($data)) {
                    if($data['gender'] == "Male") {
                        if($this->retirementModel->setNewEmpMaleRetire($data)) {
                            flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                            redirect('employees/add');
                        }
                    }
                    else if ($data['gender'] = "Female") {
                        if($this->retirementModel->setNewEmpFemaleRetire($data) ){
                            flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                            redirect('employees/add');
                        }
                    }

                } else {
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                } */


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
     * Edit Employee Profile
    */
    public function edit($id) {

        $employeeData = $this->empModel->getEmployeebyID($id);

        $data = [
            'title'             => 'Employee Profile',
            'description'       => 'Employee record',
            'id'                => $id,
            'empID'             => $employeeData->empID,
            'first_name'        => $employeeData->first_name,
            'middle_name'       => $employeeData->middle_name,
            'last_name'         => $employeeData->last_name,
            'empDOB'            => $employeeData->empDOB,
            'gender'            => $employeeData->gender,
            'phoneOne'          => phoneFormat($employeeData->phoneOne),
            'phoneTwo'          => phoneFormat($employeeData->phoneTwo),
            'retirement'        => $employeeData->retirementDate, 
            'internalEmail'     => $employeeData->internalEmail,
            'externalEmail'     => $employeeData->externalEmail,
            'hire_date'         => $employeeData->hire_date,
            'empAge'            => calcAge($employeeData->empDOB)
        ]; 

        $this->view('employees/edit', $data);
    }


    /**
     * Edit Employee Profile
    */
    public function editProfile($id) {

        $profileData = $this->empModel->getEmployeebyID($id);
        
        //$retirement = $this->retirementModel->calcRetirement($id, $employeeData->gender, $retireFemale->years, $retireMale->years);
      
        //$this->empModel->findEmpByID($data['empID'])

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'title'             => 'Employee Profile',
                'description'       => 'Employee record',
                'empID'             => '',
               /* 'retirement'        => $retirement->retirementDate
               'departments' => $deptHistory,
                'id' => $id,
                'deptCode' => trim($_POST['deptCode']),
                'deptName' => trim($_POST['deptName']),
                'modified_on' => date("Y-m-d H:i:s"),
                'deptCode_err' => '',
                'deptName_err' => '' */
            ]; 


             // Filter Email
             if (filter_var($data['empEmail'], FILTER_VALIDATE_EMAIL)) :
                $data['empEmail_err'] = 'Invalid Email Address';
            endif;
        } 
        else {

            $data = [
                'title'             => 'Employee Profile',
                'description'       => 'Employee record',
                'id'                => $id,
                'empID'             => $profileData->empID,
                'first_name'        => $profileData->first_name,
                'middle_name'       => $profileData->middle_name,
                'last_name'         => $profileData->last_name,
                'empDOB'            => $profileData->empDOB,
                'gender'            => $profileData->gender,
                'retirement'        => date("F j, Y", strtotime($profileData ->retirementDate)), 
                'empEmail'          => $profileData->emailAddress,
                'hire_date'         => date("F j, Y", strtotime($profileData ->hire_date))
                
            ]; 
    
            $this->view('employees/edit', $data);
        }
    }
}








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